<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use App\Models\Periode;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/Pinjaman/PinjamanPeriode', [
            'title' => 'Periode Pinjaman',
            "periode" => Periode::all()
        ]);
    }
    public function pinjaman($id)
    {
        $user = Auth::user()->id;
        $admin = Auth::user()->is_admin;
        if ($admin == TRUE) {
            $data = Pinjaman::where('id_periode', $id)->get();
        } else {
            $data = Pinjaman::where('id_periode', $id)->where('id_user', $user)->get();
        }

        return view('/Pinjaman/gaji', [
            'title' => 'Daftar Pinjaman',
            'gaji' => $data,
            'id_periode' => $id,
            'periode' => Periode::find($id)
        ]);
    }

    public function detail($id)
    {
        $data = Pinjaman::find($id);
        // dd($data);
        return view('/Pinjaman/detailgaji', [
            'title' => 'Detail Data',
            'pemohon' => $data
        ]);
    }

    public function cetak($id)
    {
        function rupiah($angka)
        {

            $hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
            return $hasil_rupiah;
        };

        $pinjaman = Pinjaman::where('id', $id)->first();

        //PERBULAN
        //gaji bersih
        $luarantotal = $pinjaman->usaha + $pinjaman->rumah_tangga + $pinjaman->lain_lain;
        $gajibersih = $pinjaman->gaji_kotor - $luarantotal;
        // normalisasi (75% dari gaji bersih)
        $normalisasi = $gajibersih * (75 / 100);
        //angsuran pokok
        $angsuran_pokok = ($pinjaman->pinjaman + $pinjaman->simpanan_wajib) / $pinjaman->waktu;
        //angsuran bunga
        $angsuran_bunga = ($pinjaman->pinjaman * $pinjaman->bunga) / 100;
        // total angsuran
        $angsuran_total = $angsuran_pokok + $angsuran_bunga;
        // total yang harus dilunasi
        $hutang = $angsuran_total * $pinjaman->waktu;
        // Rekomendasi pinjaman maksimal
        $a = (100 + ($pinjaman->bunga * $pinjaman->waktu)) / 100;
        $rekomendasi = ($normalisasi * $pinjaman->waktu) / $a;

        //PERMINGGU
        //Total angsuran
        $total_angsuran = ($pinjaman->pinjaman * ($pinjaman->bunga + 100)) / 100 + $pinjaman->simpanan_wajib;
        // RPC minggu
        $rpc_minggu = $normalisasi / 4;
        //angsuran total perminggu
        $angsuran_perminggu = $total_angsuran / $pinjaman->waktu;
        // angsuran bunga
        $angsuran_bungam = $angsuran_perminggu - $angsuran_pokok;
        // rekomendasi mingguan
        $rekomendasi_m = $rpc_minggu * $pinjaman->waktu;
        $rekomendasi_minggu = (($rekomendasi_m - $pinjaman->simpanan_wajib) * 100) / ($pinjaman->bunga + 100);

        if ($pinjaman->kurung_waktu == 'minggu') {
            $rekomendasimax = $rekomendasi_minggu;
            $rpc = $rpc_minggu;
            $totalpinjaman = $total_angsuran;
            $angsuran_b = $angsuran_bungam;
            $angsuran_t = $angsuran_perminggu;
        } else {
            $rekomendasimax = $rekomendasi;
            $rpc = $normalisasi;
            $totalpinjaman = $hutang;
            $angsuran_b = $angsuran_bunga;
            $angsuran_t = $angsuran_total;
        }
        if ($rekomendasimax < $pinjaman->pinjaman) {
            $status =  'Tidak Layak';
        } else {
            $status = 'Layak';
        }
        // dd($pinjaman);
        $templateProcessor = new TemplateProcessor('wordtemplate/template.docx');

        $templateProcessor->setValues(
            [
                'tanggal' => $pinjaman->tgl_pengajuan,
                'namaibu' => $pinjaman->pemohon->nama_ibu,
                'namanasabah' => $pinjaman->pemohon->nama,
                'namapasangan' => $pinjaman->pemohon->nama_pasangan,
                'status' => $pinjaman->pemohon->status_nasabah,
                'nik' => $pinjaman->pemohon->no_ktp,
                'nohp' => $pinjaman->pemohon->no_hp,
                'alamatrumah' => $pinjaman->pemohon->alamat_rumah,
                'jenisusaha' => $pinjaman->pemohon->jenis_usaha,
                'lamausaha' => $pinjaman->pemohon->lama_usaha,
                'lokasiusaha' => $pinjaman->pemohon->lokasi_usaha,
                'lamamenetap' => $pinjaman->pemohon->lama_menetap,
                'keperluan' => $pinjaman->pemohon->keperluan,
                'pendapatan' => rupiah($pinjaman->gaji_kotor),
                'luaranpokok' => rupiah($pinjaman->usaha),
                'luaranrumah' => rupiah($pinjaman->rumah_tangga),
                'luaranlain' => rupiah($pinjaman->lain_lain),
                'simpananwajib' => rupiah($pinjaman->simpanan_wajib),
                'luarantotal' => rupiah($luarantotal),
                'pendapatanbersih' => rupiah($gajibersih),
                'rpc' => rupiah($rpc),
                'pinjaman' => rupiah($pinjaman->pinjaman),
                'waktu' => $pinjaman->waktu,
                'pola' => $pinjaman->kurung_waktu,
                'bunga' => $pinjaman->bunga,
                'angsuranpokok' => rupiah($angsuran_pokok),
                'angsuranbunga' => rupiah($angsuran_b),
                'angsuranperbulan' => rupiah($angsuran_t),
                'angsurantotal' => rupiah($totalpinjaman),
                'rekomendasi' => rupiah($rekomendasimax),
                'statuslayak' => $status

            ]
        );
        $filename = $pinjaman->pemohon->nama;
        $templateProcessor->saveAs($filename . '.docx');
        return response()->download($filename . '.docx')->deleteFileAfterSend(true);
        // return view('/Pinjaman/cetakpinjaman', [
        //     'title' => 'Print',
        //     'gaji' => Gaji::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah($id)
    {
        return view('/Pinjaman/tambahgaji', [
            'title' => 'Tambah Data',
            'pemohon' => Pemohon::all(),
            // 'periode' => Periode::all(),
            'kondisi' => new Pinjaman,
            'user' => Auth::user()->id,
            'isAdmin' =>  Auth::user()->is_admin,
            'id_periode' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePinjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // dd(str_replace(".", "", $request->pinjaman));
        $validateData = $request->validate([
            'id_periode' => 'required',
            'id_pemohon' => 'required',
            'pinjaman' => 'required|string',
            'gaji_kotor' => 'required|string',
            'usaha' => 'required|string',
            'rumah_tangga' => 'required|string',
            'lain_lain' => 'required|string',
            'simpanan_wajib' => 'string',
            'bunga' => 'required|numeric',
            'waktu' => 'required|numeric',
            'kurung_waktu' => 'required|string',
            'tgl_pengajuan' => 'required'
        ]);
        $user = $request->user()->id;
        $validateData['id_user'] = $user;
        $validateData['pinjaman'] = str_replace(".", "", $request->pinjaman);
        $validateData['gaji_kotor'] = str_replace(".", "", $request->gaji_kotor);
        $validateData['usaha'] = str_replace(".", "", $request->usaha);
        $validateData['rumah_tangga'] = str_replace(".", "", $request->rumah_tangga);
        $validateData['lain_lain'] = str_replace(".", "", $request->lain_lain);
        $validateData['simpanan_wajib'] = str_replace(".", "", $request->simpanan_wajib);

        Pinjaman::create($validateData);
        return redirect()->route('pinjaman', $request->id_periode)->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjaman $pinjaman)
    {
        return view('/Pinjaman/detailgaji', [
            'title' => 'Detail Data',
            'pemohon' => $pinjaman
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjaman $pinjaman)
    {
        return view('/Pinjaman/updategaji', [
            'title' => 'Update Data Pinjaman',
            'pemohon' => $pinjaman,
            'periode' => Periode::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePinjamanRequest  $request
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjaman $pinjaman)
    {
        // dd($request);
        $validateData = $request->validate([
            'pinjaman' => 'required|string',
            'gaji_kotor' => 'required|string',
            'usaha' => 'required|string',
            'rumah_tangga' => 'required|string',
            'lain_lain' => 'required|string',
            'simpanan_wajib' => 'required|string',
            'bunga' => 'required|numeric',
            'waktu' => 'required|numeric',
            'kurung_waktu' => 'required',
            'tgl_pengajuan' => 'required',
        ]);
        $validateData['pinjaman'] = str_replace(".", "", $request->pinjaman);
        $validateData['gaji_kotor'] = str_replace(".", "", $request->gaji_kotor);
        $validateData['usaha'] = str_replace(".", "", $request->usaha);
        $validateData['rumah_tangga'] = str_replace(".", "", $request->rumah_tangga);
        $validateData['lain_lain'] = str_replace(".", "", $request->lain_lain);
        $validateData['simpanan_wajib'] = str_replace(".", "", $request->simpanan_wajib);
        // dd($validateData);
        Pinjaman::where('id', $request->id)->update($validateData);
        return redirect()->route('pinjaman', ['id' => $request->id_periode])->with('success', 'Data lama berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjaman $pinjaman)
    {
        // dd($pinjaman);
        Pinjaman::destroy($pinjaman->id);
        return redirect()->route('pinjaman', $pinjaman->id_periode)->with('delete', 'Data berhasil dihapuskan');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Nilai;
use App\Models\Pemohon;
use App\Models\Periode;
use App\Models\Kriteria;
use App\Models\Pinjaman;
use App\Models\Alternatif;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\ValidatedData;

class AlternatifController extends Controller
{


    public function index()
    {
        return view('Alternatif/PeriodeAlt', [
            "title" => "Periode Penilaian Debitur",
            "periode" => Periode::all()
        ]);
    }
    // public function index()
    // {
    //     return view('Alternatif/detailAlt', [
    //         "title" => "Detail Alternatif",
    //         "nilai" => Nilai::all()
    //     ]);
    // }

    public function loadData(Request $request)
    {
        // dd('sfdfsfsf');
        $pemohon_id = $request->input('pemohon_id');
        $id_periode = $request->input('id_periode');

        $data = Pinjaman::where('id_pemohon', $pemohon_id)->where('id_periode', $id_periode)->get();
        // dd($data);
        // kirim JSON:
        // return response()->json($data);
        // return response()->json(['data' => $data]);

        // kirim HTML:
        return view('Alternatif/_load-data', [
            'data' => $data
        ]);
    }
    public function alternatif($id)
    {

        $data = Alternatif::where('id_periode', $id)->get();
        $kriteria = Kriteria::all();
        return view('/Alternatif/alternatif', [
            'title' => 'Daftar Penilaian Debitur',
            // 'data' => $arr,
            'data' => $data,
            'id_periode' => $id,
            'kriteria' => $kriteria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request, $id)
    {
        // dd(Nilai::all());
        return view('Alternatif/tambahAlternatif', [
            "title" => "Tambah Penilaian Debitur",
            "kondisi" => new Alternatif,
            "pemohon" => Pemohon::all(),
            // "character" => Nilai::where('kriteria_id', 1)->get(),
            // "capital" => Nilai::where('kriteria_id', 3)->get(),
            // "capacity" => Nilai::where('kriteria_id', 2)->get(),
            // "condition" => Nilai::where('kriteria_id', 4)->get(),
            // "collateral" => Nilai::where('kriteria_id', 5)->get(),
            "nilai" => Nilai::all(),
            "kriteria" => Kriteria::all(),
            "periode" => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubkriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $count = count($request['kriteria_id']);
        for ($i = 0; $i < $count; $i++) {
            Alternatif::insert([
                'pemohon_id' => $request->pemohon_id,
                'id_periode' => $request->id_periode,
                'kriteria_id' => $request->kriteria_id[$i],
                'nilai_id' => $request->nilai_id[$i]
            ]);
        }
        return redirect()->route('alternatif', $request->id_periode)->with('success', 'Data baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */

    public function edit(Alternatif $alternatif)
    {
        return view('Alternatif/updateAlternatif', [
            "title" => "Update Penilaian Debitur",
            "nilai" => Nilai::where('kriteria_id', $alternatif->kriteria_id)->get(),
            "alternatif" => $alternatif


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubkriteriaRequest  $request
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        // dd($request);
        Alternatif::where('id', $alternatif->id)->update([
            'nilai_id' => $request->nilai_id
        ]);
        // return back()->with('success', 'Data berhasil diupdate');
        return redirect()->route('alternatif', $request->id_periode)->with('success', 'Data baru berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     // $count
    //     Alternatif::where('pemohon_id', $id)->delete();
    //     return redirect()->back()->with('delete', 'Data telah berhasil di hapus');
    // }
    public function delete($PemId, $PeriodId)
    {
        // dd($PeriodId);
        Alternatif::where('pemohon_id', $PemId)->where('id_periode', $PeriodId)->delete();
        // Hasil::where('id_pemohon', $PemId)->where('id_periode', $PeriodId)->delete();
        return redirect()->back()->with('delete', 'Data telah berhasil di hapus');
    }
}

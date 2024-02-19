<?php

namespace App\Http\Controllers;


use Exception;
use App\Models\Pemohon;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\ValidatedData;

class PemohonController extends Controller
{

    // public function index()
    // {
    //     return view('Pemohon/Periode', [
    //         "title" => "Periode Pemohon",
    //         "periode" => Periode::all()
    //     ]);
    // }
    public function index()
    {
        $user = Auth::user()->id;
        $admin = Auth::user()->is_admin;
        if ($admin == TRUE) {
            $data = Pemohon::all();
        } else {
            $data = Pemohon::where('id_user', $user)->get();
        }
        // dd($data);
        return view('Pemohon/pemohon', [
            "title" => "Debitur",
            "pengajuan" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        return view('/Pemohon/detailpemohon', [
            "title" => "Detail Debitur",
            "pemohon" => Pemohon::where('id', $id)->get()
        ]);
    }
    public function create()
    {

        return view('/Pemohon/TambahKreditur', [
            "title" => "Tambah Debitur"
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

        $validateData = $request->validate([
            'nama' => 'required|string|max:155',
            'no_ktp' => 'required|numeric|unique:pemohons',
            'no_hp' => 'numeric|nullable',
            'nama_pasangan' => 'string|nullable',
            'nama_ibu' => 'string|required',
            'status_nasabah' => 'string|required',
            'alamat_rumah' => 'string|required',
            'jenis_usaha' => 'string|required',
            'lama_usaha' => 'string|nullable',
            'lokasi_usaha' => 'string|nullable',
            'lama_menetap' => 'string|nullable',
            'keperluan' => 'string|required',
            'tgl_pengajuan' => 'required',
            'imgrumah' => 'image',
            'imgnasabah' => 'image',
            'imgjaminan' => 'image',
            'imgktp' => 'image',
            'imgkk' => 'image'
        ]);

        if ($request->file('imgrumah')) {
            $validateData['imgrumah'] = $request->file('imgrumah')->store('pemohon-images');
        }
        if ($request->file('imgnasabah')) {
            $validateData['imgnasabah'] = $request->file('imgnasabah')->store('pemohon-images');
        }
        if ($request->file('imgjaminan')) {
            $validateData['imgjaminan'] = $request->file('imgjaminan')->store('pemohon-images');
        }
        if ($request->file('imgktp')) {
            $validateData['imgktp'] = $request->file('imgktp')->store('pemohon-images');
        }
        if ($request->file('imgkk')) {
            $validateData['imgkk'] = $request->file('imgkk')->store('pemohon-images');
        }

        $user = $request->user()->id;
        $validateData['id_user'] = $user;
        // dd($validateData);
        Pemohon::create($validateData);

        return redirect('/pemohon')->with('success', 'Data baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Pemohon $pemohon)
    {

        return view('/Pemohon/detailpemohon', [
            "title" => "Detail Debitur",
            "pemohon" => $pemohon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemohon $pemohon)
    {
        // dd($pemohon);
        return view('/Pemohon/update', [
            "title" => "Update Debitur",
            "post" => $pemohon,
            "pemohon" => Pemohon::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubkriteriaRequest  $request
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemohon $pemohon)
    {
        // dd($request);
        $rules = [
            'nama' => 'required|string|max:155',
            'no_ktp' => 'required|numeric|unique:pemohons',
            'no_hp' => 'numeric|nullable',
            'nama_pasangan' => 'string|nullable',
            'nama_ibu' => 'string|required',
            'status_nasabah' => 'string|required',
            'alamat_rumah' => 'string|required',
            'jenis_usaha' => 'string|required',
            'lama_usaha' => 'string|nullable',
            'lokasi_usaha' => 'string|nullable',
            'lama_menetap' => 'string|nullable',
            'keperluan' => 'string|required',
            'tgl_pengajuan' => 'required',
            'imgrumah' => 'image',
            'imgnasabah' => 'image',
            'imgjaminan' => 'image',
            'imgktp' => 'image',
            'imgkk' => 'image'
        ];

        if ($request->no_ktp != $pemohon->no_ktp) {
            $rules['no_ktp'] = 'required|numeric|unique:pemohons';
        } else {
            $rules['no_ktp'] = 'required|numeric';
        }
        $validateData = $request->validate($rules);

        if ($request->file('imgrumah')) {
            if ($request->oldrumah) {
                Storage::delete($request->oldrumah);
            }
            $validateData['imgrumah'] = $request->file('imgrumah')->store('pemohon-images');
        }
        if ($request->file('imgnasabah')) {
            if ($request->oldnasabah) {
                Storage::delete($request->oldnasabah);
            }
            $validateData['imgnasabah'] = $request->file('imgnasabah')->store('pemohon-images');
        }
        if ($request->file('imgjaminan')) {
            if ($request->oldjaminan) {
                Storage::delete($request->oldjaminan);
            }
            $validateData['imgjaminan'] = $request->file('imgjaminan')->store('pemohon-images');
        }
        if ($request->file('imgktp')) {
            if ($request->oldktp) {
                Storage::delete($request->oldktp);
            }
            $validateData['imgktp'] = $request->file('imgktp')->store('pemohon-images');
        }
        if ($request->file('imgkk')) {
            if ($request->oldkk) {
                Storage::delete($request->oldkk);
            }
            $validateData['imgkk'] = $request->file('imgkk')->store('pemohon-images');
        }
        // dd($validateData);
        Pemohon::where('id', $pemohon->id)->update($validateData);
        return redirect()->route('detailpemohon', ['id' => $pemohon->id])->with('success', 'Data lama berhasil diupdate');
        // return redirect('/pemohon')->with('success', 'Data telah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemohon $pemohon)
    {
        try {
            if ($pemohon->imgrumah) {
                Storage::delete($pemohon->imgrumah);
            }
            if ($pemohon->imgnasabah) {
                Storage::delete($pemohon->imgnasabah);
            }
            if ($pemohon->imgjaminan) {
                Storage::delete($pemohon->imgjaminan);
            }
            if ($pemohon->imgktp) {
                Storage::delete($pemohon->imgktp);
            }
            if ($pemohon->imgkk) {
                Storage::delete($pemohon->imgkk);
            }
            Pemohon::destroy($pemohon->id);
            return redirect('/pemohon')->with('delete', 'Data berhasil dihapuskan');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/pemohon')->with('delete', 'Data tidak dapat dihapus karena digunakan pada pinjaman atau penilaian debitur');
        }
    }
}

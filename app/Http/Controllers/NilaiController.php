<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Nilai;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreNilaiRequest;
use App\Http\Requests\UpdateNilaiRequest;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/Penilaian/index', [
            'title' => 'Daftar Penilaian',
            'nilai' => Nilai::all(),
            'kriteria' => Kriteria::all()
        ]);
    }

    public function detail($id)
    {

        return view('/Penilaian/nilai', [
            'title' => 'Daftar Penilaian',
            'nilai' => Nilai::where('kriteria_id', $id)->get(),
            'kriteria' => Kriteria::findOrFail($id),
            "id_kriteria" => $id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function make($id)
    {
        return view('Penilaian/tambahNilai', [
            "title" => "Tambah Penilaian",
            "kriteria" => Kriteria::all(),
            "id_kriteria" => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNilaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kriteria_id' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required|numeric',
        ]);

        Nilai::create($validateData);
        return redirect()->route('nilaidetail', ['id' => $request->kriteria_id])->with('success', 'Data baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        return view('/Penilaian/updateNilai', [
            "title" => "Update Pemohon",
            "nilai" => $nilai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiRequest  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        // dd($nilai);
        $rules = [
            'kriteria_id' => 'required',
            'deskripsi' => 'required',
            'nilai' => 'required|numeric',
        ];
        $validateData = $request->validate($rules);

        Nilai::where('id', $nilai->id)->update($validateData);
        return redirect()->route('nilaidetail', $nilai->kriteria_id)->with('success', 'Data telah berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        try {
            $data = Nilai::destroy($nilai->id);
            # code...
            return redirect()->route('nilaidetail', $nilai->kriteria_id)->with('delete', 'Data telah berhasil di hapus');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('nilaidetail', $nilai->kriteria_id)->with('delete', 'Data tidak dapat dihapus karena terhubung pada tabel penilaian debitur');
        }
    }
}

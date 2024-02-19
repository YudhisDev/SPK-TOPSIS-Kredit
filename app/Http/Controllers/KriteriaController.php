<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\kuesioner;

class KriteriaController extends Controller
{
    public function index()
    {
        $kuesioner = kuesioner::all();
        $kriteria = Kriteria::all();
        $bobot = array();
        $sum = [0, 0, 0, 0, 0];
        $mean = array();
        foreach ($kuesioner as $key => $column) {
            $bobot[0][$key] = $column['character'];
            $bobot[1][$key] = $column['capacity'];
            $bobot[2][$key] = $column['capital'];
            $bobot[3][$key] = $column['collateral'];
            $bobot[4][$key] = $column['condition'];
        }
        // dd(count($kuesioner));
        // dd($bobot);
        // dd($mean);
        //Rata-Rata

        for ($j = 0; $j < count($kriteria); $j++) {
            for ($i = 0; $i < count($kuesioner); $i++) {
                $sum[$j] += $bobot[$j][$i];
                $mean[$j] = $sum[$j] / count($kuesioner);
            }
        }
        $count = kuesioner::count();
        // dd($count);
        return view('kriteria/kriteria', [
            "title" => "Daftar Kriteria",
            "kuesioner" => $mean,
            "kriteria" => Kriteria::all(),
            "count" => $count
        ]);
    }
    public function ubah()
    {
        $kuesioner = kuesioner::all();
        $kriteria = Kriteria::all();
        $bobot = array();
        $sum = [0, 0, 0, 0, 0];
        $mean = array();
        foreach ($kuesioner as $key => $column) {
            $bobot[0][$key] = $column['character'];
            $bobot[1][$key] = $column['capital'];
            $bobot[2][$key] = $column['capacity'];
            $bobot[3][$key] = $column['collateral'];
            $bobot[4][$key] = $column['condition'];
        }
        // dd(count($kuesioner));
        // dd($bobot);
        //Rata-Rata

        for ($j = 0; $j < count($kriteria); $j++) {
            for ($i = 0; $i < count($kuesioner); $i++) {
                $sum[$j] += $bobot[$j][$i];
                $mean[$j] = $sum[$j] / count($kuesioner);
            }
        }
        // dd($mean);
        foreach ($mean as $key => $value) {
            Kriteria::where('id', $key + 1)->update(['nilaiBobot' => $value]);
        }

        // Kriteria::where('id', $kriterium->id)->update($validateData);
        return redirect('kriteria')->with('success', 'Data telah berhasil di update');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubkriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriterium)
    {
        // dd($kriteria);
        return view('kriteria/updateKriteria', [
            "title" => "Update Kriteria",
            "post" => $kriterium,
            "kriteria" => Kriteria::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubkriteriaRequest  $request
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriterium)
    {
        // dd($request);
        $validateData = $request->validate([
            'nilaiBobot' => 'required|numeric',
            'jenis' => 'required',
        ]);

        Kriteria::where('id', $kriterium->id)->update($validateData);
        return redirect('kriteria')->with('success', 'Data telah berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

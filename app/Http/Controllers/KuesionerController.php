<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\kuesioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorekuesionerRequest;
use App\Http\Requests\UpdatekuesionerRequest;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        $kuesioner = kuesioner::where('id_user', $user_id)->get();
        // return $kuesioner;
        return view('Kuesioner/kuesioner', [
            'title' => 'Kuesioner',
            'user_id' => $user_id,
            'kuesioner' => $kuesioner,
            'nama' => $user_name
        ]);
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
     * @param  \App\Http\Requests\StorekuesionerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->id_user);
        $validateData = $request->validate([
            'id_user' => 'required|unique:kuesioners',
            'character' => 'required',
            'capital' => 'required',
            'capacity' => 'required',
            'collateral' => 'required',
            'condition' => 'required'
        ]);
        Kuesioner::create($validateData);
        return redirect('kuesioner')->with('success', 'Data Kuesioner Telah Diinputkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function show(kuesioner $kuesioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function edit(kuesioner $kuesioner)
    {
        return view('Kuesioner/ubahkuesioner', [
            "title" => "Update Kuesioner",
            "kuesioner" => $kuesioner

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekuesionerRequest  $request
     * @param  \App\Models\kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'character' => 'required',
            'capacity' => 'required',
            'capital' => 'required',
            'collateral' => 'required',
            'condition' => 'required',
        ]);

        kuesioner::where('id', $request->id)->update($validated);
        return redirect('kuesioner')->with('success', 'Data lama berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kuesioner  $kuesioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(kuesioner $kuesioner)
    {
        // dd($kuesioner);
        kuesioner::destroy($kuesioner->id);
        return redirect('kuesioner')->with('delete', 'Data berhasil dihapuskan');
    }
}

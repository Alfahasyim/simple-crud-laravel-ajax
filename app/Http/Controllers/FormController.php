<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function read()
    {
        $data = karyawan::all();
        return view('read')->with([
            'data' => $data
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'gaji' => 'required|max:11',
        ]);

        $data['nama'] = $request->nama;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['gaji'] = $request->gaji;
        $data['status_karyawan'] = $request->status_karyawan;

        karyawan::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = karyawan::findOrFail($id);
        return view('edit')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'gaji' => 'required|max:11',
        ]);

        $data = karyawan::findOrFail($id);
        $data->nama = $request->nama;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->gaji = $request->gaji;
        $data->status_karyawan = $request->status_karyawan;
        $data->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = karyawan::findOrFail($id);
        $data->delete();
    }
}

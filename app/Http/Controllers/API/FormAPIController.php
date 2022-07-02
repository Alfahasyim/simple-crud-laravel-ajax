<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\karyawan;


class FormAPIController extends Controller
{
		public function read()
		{
			$data = karyawan::all();
			return response()->json([
				'message'       => 'Success',
				'data_karyawan' => $data
			],200);
		}

    public function create(Request $request)
    {
			$request->validate([
				'nama' => 'required|max:50',
				'tanggal_lahir' => 'required|date',
				'gaji' => 'required|max:11',
				'status_karyawan' => 'required',
			]);
			

			// $karyawan = new karyawan;
			$karyawan = karyawan::create([
				'nama' => $request->nama,
				'tanggal_lahir' => $request->tanggal_lahir,
				'gaji' => $request->gaji,
				'status_karyawan' => $request->status_karyawan,
			]);

			return response()->json([
				'message'       => 'Create Success',
				'data_karyawan' => $karyawan
			],200);
    }

    public function edit($id)
    {
			$karyawan = karyawan::find($id);
			
			return response()->json([
				'message'       => 'Success',
				'data_karyawan' => $karyawan
			],200);
    }

    public function update(Request $request, $id)
    {
		
		$request->validate([
			'nama' => 'required|max:50',
			'tanggal_lahir' => 'required|date',
			'status_karyawan' => 'required',
			'gaji' => 'required|max:11',
		]);
		
		
		$data = karyawan::findOrFail($id);
		$data->nama = $request->nama;
		$data->tanggal_lahir = $request->tanggal_lahir;
		$data->gaji = $request->gaji;
		$data->status_karyawan = $request->status_karyawan;
		$data->update();

		return response()->json([
			'message'       => 'Update Success',
			'data_karyawan' => $data
		],200);
    }

    public function delete($id)
    {
			$karyawan = karyawan::find($id)->delete();
			
			return response()->json([
				'message'       => 'Delete Success'
			],200);
    }
}

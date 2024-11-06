<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PenjualanModel;

class PenjualanController extends Controller
{
    public function index()
    {
        return PenjualanModel::all();
    }
    public function store(Request $request)
    {
        $penjualan = PenjualanModel::create($request->all());
        return response()->json($penjualan, 201);
    }
    public function show(PenjualanModel $penjualan)
    {
        return response()->json($penjualan);
    }
    public function update(Request $request, PenjualanModel $penjualan)
    {
        $penjualan->update($request->all());
        return response()->json($penjualan);
    }
    public function destroy(PenjualanModel $penjualan)
    {
        $penjualan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }

    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'pembeli' => 'required',
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //jika validation gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //create user
        $penjualan = PenjualanModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'image' => $request->image->hashName(),
        ]);
        //return response JSON jika user berhasil dibuat
        if ($penjualan) {
            return response()->json([
                'success' => true,
                'penjualan' => $penjualan,
            ], 201);
        }
        //return response JSON jika create user gagal :(
        return response()->json([
            'success' => false
        ], 409);
    }
}

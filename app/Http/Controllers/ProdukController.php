<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function GetProduk(Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('nama');
        $qty = $request->input('qty');
        $harga = $request->input('harga');
        $update = $request->input('update');
        $total_harga = $qty * $harga;
        if ($update != true && $nama == true && $qty == true && $harga == true) {
            $data = [
                'nama' => $nama,
                'kategori' => $request->input('kategori'),
                'qty' => $request->input('qty'),
                'harga' => $request->input('harga'),
                'total_harga' => $total_harga,
            ];
            $db = Product::insert($data);
            return response()->json([
                'Success' => $db
            ]);
        }else if($update === "UpdateProduk"){
            $data = [
                'nama' => $nama,
                'kategori' => $request->input('kategori'),
                'qty' => $request->input('qty'),
                'harga' => $request->input('harga'),
                'total_harga' => $total_harga,
            ];
            $db = Product::upd_produk($id,$data);
            return response()->json([
                'Successss' => $db
            ]);
        }else{
            $db = Product::all();
            return response()->json([
                'data' => $db
            ]);
        }
    }

   
}

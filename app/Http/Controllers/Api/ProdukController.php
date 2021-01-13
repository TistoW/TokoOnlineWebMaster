<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;

class ProdukController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $produk = Produk::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get Produk Berhasil',
            'produks' => $produk
        ]);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $fillable = ['transaksi_id', 'produk_id', 'total_item', 'catatan',
        'kode_promo', 'harga_asli', 'total_harga'];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, "transaksi_id", "id");
    }

    public function produk(){
        return $this->belongsTo(Produk::class, "produk_id", "id");
    }
}

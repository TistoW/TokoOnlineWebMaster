<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['user_id', 'kode_payment',
        'kode_trx', 'total_item', 'total_harga', 'kode_unik',
        'status', 'resi', 'kurir', 'name', 'phone', 'detail_lokasi', 'metode',
        'deskripsi', 'expired_at'];

    public function details(){
        return $this->hasMany(TransaksiDetail::class, "transaksi_id", "id");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}

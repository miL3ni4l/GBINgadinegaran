<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['kode_transaksi', 'kategori_id', 'tgl_transaksi', 'nominal', 'status', 'ket', 'bukti'];

    // public function anggota()
    // {
    // 	return $this->belongsTo(Anggota::class);
    // } 

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class);
    }
} 

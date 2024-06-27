<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory;
    protected $table = 'tabel_aplikasi';
    protected $guarded = [];
    public $incrementing = false;
    public function instansi(){
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }
    public function urusan1(){
        return $this->belongsTo(Urusan::class, 'urusan_id', 'id');
    }
    public function anakurusan1(){
        return $this->belongsTo(BidangUrusan::class, 'bidang_urusan_id', 'id');
    }
}

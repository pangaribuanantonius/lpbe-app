<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penandatanganan extends Model
{
    use HasFactory;
    protected $table = 'tabel_tandatangan_naskah';
    protected $guarded = [];
    public $incrementing = false;
    public function instansi(){
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }
}

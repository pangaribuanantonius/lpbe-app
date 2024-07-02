<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;
    protected $table = 'tabel_instansi';
    protected $guarded = [];
    public $incrementing = false;
    public function aplikasi(){
        return $this->hasMany(Aplikasi::class, 'instansi_id', 'id');
    }
    public function call_center(){
        return $this->hasMany(CallCenter::class, 'instansi_id', 'id');
    }
    public function spbe(){
        return $this->hasMany(Spbe::class, 'instansi_id', 'id');
    }
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }
}

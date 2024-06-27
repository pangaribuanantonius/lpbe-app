<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangUrusan extends Model
{
    use HasFactory;
    protected $table = 'tabel_bidang_urusan';
    protected $guarded = [];
    public $incrementing = false;
    public function urusanapladmpemerintah(){
        return $this->belongsTo(Urusan::class, 'urusan_id', 'id');
    }
}

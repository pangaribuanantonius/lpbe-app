<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urusan extends Model
{
    use HasFactory;
    protected $table = 'tabel_urusan';
    protected $guarded = [];
    public $incrementing = false;
    public function bidangurusan1(){
        return $this->hasMany(BidangUrusan::class, 'urusan_id', 'id');
    }
}

<?php

namespace App\Models;
use App\Models\CallCenter;
use App\Models\Instansi;
use App\Models\Penandatanganan;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallCenter extends Model
{
    use HasFactory;
    protected $table = 'tabel_callcenter';
    protected $guarded = [];
    public $incrementing = false;
}

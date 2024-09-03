<?php

namespace App\Models;
use App\Models\Website;
use App\Models\Instansi;
use App\Models\Penandatanganan;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $table = 'tabel_website';
    protected $guarded = [];
    public $incrementing = false;
}

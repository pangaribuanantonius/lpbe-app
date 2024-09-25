<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanSmartcity extends Model
{
    use HasFactory;
    protected $table = 'tabel_jawaban_smartcity';
    protected $guarded = [];
    public $incrementing = false;
}

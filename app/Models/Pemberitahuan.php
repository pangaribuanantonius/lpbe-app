<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemberitahuan extends Model
{
    use HasFactory;
    protected $table = 'tabel_pemberitahuan';
    protected $guarded = [];
    public $incrementing = false;

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSosial extends Model
{
    use HasFactory;
    protected $table = 'tabel_media_sosial';
    protected $guarded = [];
    public $incrementing = false;
}

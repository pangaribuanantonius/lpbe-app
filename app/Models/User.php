<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'tabel_user';
    protected $guarded = [];
    public $incrementing = false;
    public function getRouteKeyName(){
        return 'username';
    }

    public function instansi(){
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }
}


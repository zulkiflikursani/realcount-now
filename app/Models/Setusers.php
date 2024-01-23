<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setusers extends Model
{
    use HasFactory;

    protected $table = 'setuser';
    protected $fillable = [
        'kode_user',
        'kode_lokasi',
        'company'
    ];
}

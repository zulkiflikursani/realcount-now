<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jumlahsuara extends Model
{
    use HasFactory;
    protected $table = 'jumlah_suara';
    protected $fillable = [
        "kode_calon",
        "kode_anggota",
        "company",
        "jumlah_suara",
    ];
}

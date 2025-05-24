<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
   protected $fillable = ['beasiswa_id', 'nama_kriteria', 'bobot', 'atribut'];
}

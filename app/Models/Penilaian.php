<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Beasiswa;
use App\Models\User;

class Penilaian extends Model

{
     protected $table = 'penilaians'; 
    protected $fillable = ['user_id', 'beasiswa_id', 'nilai_akhir'];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'beasiswa_id');
    }
}

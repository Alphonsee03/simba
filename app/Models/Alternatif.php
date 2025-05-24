<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

   protected $fillable = ['user_id', 'kriteria_id', 'beasiswa_id', 'nilai'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

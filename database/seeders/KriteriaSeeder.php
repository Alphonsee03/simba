<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {


        $kriterias = [
            ['nama_kriteria' => 'IPK', 'bobot' => 0.4, 'atribut' => 'benefit'],
            ['nama_kriteria' => 'Penghasilan Orang Tua', 'bobot' => 0.35, 'atribut' => 'cost'],
            ['nama_kriteria' => 'Prestasi', 'bobot' => 0.25, 'atribut' => 'benefit'],
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}

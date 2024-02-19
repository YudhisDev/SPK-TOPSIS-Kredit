<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Pemohon;
use App\Models\Subkriteria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(5)->create();

        Kriteria::create([
            'namaKriteria' => 'character',
            'nilaiBobot' => '1',
            'jenis' => 'benefit'
        ]);
        Kriteria::create([
            'namaKriteria' => 'capacity',
            'nilaiBobot' => '2',
            'jenis' => 'benefit'
        ]);
        Kriteria::create([
            'namaKriteria' => 'capital',
            'nilaiBobot' => '3',
            'jenis' => 'benefit'
        ]);
        Kriteria::create([
            'namaKriteria' => 'condition',
            'nilaiBobot' => '4',
            'jenis' => 'benefit'
        ]);
        Kriteria::create([
            'namaKriteria' => 'collateral',
            'nilaiBobot' => '5',
            'jenis' => 'benefit'
        ]);



        Subkriteria::create([
            'kriteria_id' => '1',
            'nama' => 'sangat baik',
            'bobot' => '5'
        ]);
        Subkriteria::create([
            'kriteria_id' => '1',
            'nama' => 'baik',
            'bobot' => '4'
        ]);
        Subkriteria::create([
            'kriteria_id' => '1',
            'nama' => 'cukup',
            'bobot' => '3'
        ]);
        Subkriteria::create([
            'kriteria_id' => '1',
            'nama' => 'kurang',
            'bobot' => '2'
        ]);
        Subkriteria::create([
            'kriteria_id' => '1',
            'nama' => 'sangat kurang',
            'bobot' => '1'
        ]);
        Subkriteria::create([
            'kriteria_id' => '2',
            'nama' => '0-1.000.000',
            'bobot' => '1'
        ]);
        Subkriteria::create([
            'kriteria_id' => '2',
            'nama' => '1.000.000-3.000.000',
            'bobot' => '2'
        ]);
        Subkriteria::create([
            'kriteria_id' => '2',
            'nama' => '3.000.000-6.000.000',
            'bobot' => '3'
        ]);
    }
}

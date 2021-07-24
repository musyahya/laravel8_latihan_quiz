<?php

namespace Database\Seeders;

use App\Models\Soal;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Soal::create([
            'quiz_id' => 1,
            'soal' => '1 + 1 =',
            'pilihan_a' => '1',
            'pilihan_b' => '2',
            'pilihan_c' => '3',
            'pilihan_d' => '4',
            'pilihan_e' => '5',
            'jawaban' => 'pilihan_b'
        ]);

        Soal::create([
            'quiz_id' => 1,
            'soal' => '1 + 2 =',
            'pilihan_a' => '1',
            'pilihan_b' => '2',
            'pilihan_c' => '3',
            'pilihan_d' => '4',
            'pilihan_e' => '5',
            'jawaban' => 'pilihan_c'
        ]);
    }
}

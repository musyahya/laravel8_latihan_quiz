<?php

namespace Database\Seeders;

use App\Models\KelompokBelajar;
use Illuminate\Database\Seeder;

class KelompokBelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KelompokBelajar::create([
            'nama' => 'kelas 1'
        ]);
    }
}

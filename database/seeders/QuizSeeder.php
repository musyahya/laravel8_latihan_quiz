<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz = Quiz::create([
            'nama' => 'quiz matamatika',
            'status' => '1',
            'guru_id' => '1'
        ]);

        $quiz->murid()->attach([2,3]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('123123123')
        ])->assignRole('guru');

        User::create([
            'name' => 'murid',
            'email' => 'murid@gmail.com',
            'password' => bcrypt('123123123')
        ])->assignRole('murid');

        for ($i=0; $i < 10; $i++) {
            $faker = Factory::create('id_ID');
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => bcrypt('123123123')
            ])->assignRole('murid');
        }
    }
}

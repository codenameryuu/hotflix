<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        $data = [
            'username' => 'aldmic',
            'password' => Hash::make('123abc123'),
        ];

        User::create($data);

        $data = [
            'username' => 'fikrisabriansyah',
            'password' => Hash::make('fikrisabriansyah'),
        ];

        User::create($data);
    }
}

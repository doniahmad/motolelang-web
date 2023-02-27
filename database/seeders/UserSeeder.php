<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $fields = [
            'name' => 'Doni Ahmad',
            'email' => 'doniahmad@gmail.com',
            'password' => bcrypt('12345678')
        ];

        $user = User::create($fields);

        $user->assignRole('owner');
    }
}

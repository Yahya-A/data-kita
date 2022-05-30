<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'role' => 'penguji',
            'password' => password_hash('admin1',PASSWORD_DEFAULT)
        ]);
        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'role' => 'penindak',
            'password' => password_hash('admin2',PASSWORD_DEFAULT)
        ]);
    }
}

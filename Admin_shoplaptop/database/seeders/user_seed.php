<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class user_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'name' => 'admin'
        ];
        User::create($data);
    }
}

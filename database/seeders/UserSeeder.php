<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'name' => 'Saw Soe Linn Htet',
            'username' => 'soesoe',
            'email' => 'user@gmail.com',
            'password' => '11111111',
            'email_verified_at' => Carbon::now(),
            'phone' => '09962569030'
        ]);
    }
}

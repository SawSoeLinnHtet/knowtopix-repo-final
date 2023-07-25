<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Staff;
use Illuminate\Database\Seeder;
use App\Models\Enums\StatusTypes;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
            'name' => 'Saw Soe Linn Htet',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('11111111'),
            'email_verified_at' => Carbon::now(),
            'phone' => '09962569030',
            'status' => StatusTypes::ACTIVE,
        ]);
    }
}

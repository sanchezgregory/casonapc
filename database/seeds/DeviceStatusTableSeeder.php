<?php

use App\DeviceStatus;
use Illuminate\Database\Seeder;

class DeviceStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DeviceStatus::class, 30);
    }
}

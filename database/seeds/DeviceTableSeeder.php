<?php

use App\Device;
use Illuminate\Database\Seeder;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('devices')->truncate(); // solo llena con x cantidad, no permite mas entrada de datos

        factory(Device::class,30)->create();
    }
}

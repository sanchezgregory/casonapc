<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomerTableSedeer::class);
        $this->call(UserTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(DeviceTableSeeder::class);
        $this->call(DeviceStatusTableSeeder::class);

    }
}

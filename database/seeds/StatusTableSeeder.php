<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('departments')->truncate(); // solo llena con x cantidad, no permite mas entrada de datos

        factory(Status::class,5)->create();
    }
}

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
        factory(Status::class)->create([
            'name' => 'Corregido'
        ]);
        factory(Status::class,5)->create();
    }
}

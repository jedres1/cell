<?php

use Illuminate\Database\Seeder;
use App\Cellphone;

class CellphonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cellphones::class, 20)->create();
    }
}

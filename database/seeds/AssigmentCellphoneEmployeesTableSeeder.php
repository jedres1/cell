<?php

use Illuminate\Database\Seeder;
use App\AssigmentCellphoneEmployees;

class AssigmentCellphoneEmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AssignmentCellphoneEmployee::class, 20)->create();
    }
}

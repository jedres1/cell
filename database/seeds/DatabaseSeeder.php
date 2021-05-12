<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   $this->call(UsersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        //$this->call(EmployeesTableSeeder::class);
        //$this->call(NumbersTableSeeder::class);
        //$this->call(CellphonesTableSeeder::class);
        //$this->call(AssignmentCellphoneEmployeesTableSeeder::class);
    }
}

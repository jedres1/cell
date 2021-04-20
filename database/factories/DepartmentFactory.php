<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'department_name'=> $faker->randomElement(['ventas','administracion','mantenimiento','tecnologia','produccion','diseño','impresion','proyectos']),
    ];
});

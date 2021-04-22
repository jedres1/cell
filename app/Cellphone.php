<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellphone extends Model
{
   protected $fillable = [
    'model',
    'marca',
    'imei',
    'number',
    'department_id',
    'company_id',
    'employee_id'
   ];
}

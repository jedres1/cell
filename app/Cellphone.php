<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Company;
use App\User;
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

   public function departments()
   {
      return $this->hasOne(Department::class);
   }
   public function companies()
   {
      return $this->hasOne(Company::class);
   }
   public function employees()
   {
      return $this->belongsTo(Employee::class);
   }
}

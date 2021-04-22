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

   public function department()
   {
      return $this->belongsTo(Department::class);
   }
   public function company()
   {
      return $this->belongsTo(Company::class);
   }
   public function employee()
   {
      return $this->belongsTo(Employee::class);
   }
}

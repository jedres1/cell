<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $fillable = [
      'employee_name',
      'department_id',
      'company_id',
      'job_title'
   ];
    public function department()
   {
      return $this->belongsTo(Department::class);
   }
   public function company()
   {
      return $this->belongsTo(Company::class);
   }
}

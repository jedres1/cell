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
    'brand',
    'imei',
    'number',
    'department_id',
    'company_id'
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Company;
use App\Number;
use App\User;

class Cellphone extends Model
{
   protected $fillable = [
    'model',
    'brand',
    'imei',
    'number_id',
    'status',
    'accessories',
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
   public function number()
   {
      return $this->belongsTo(Number::class);
   }
   public function scopeFilter($query, $filters)
   {
       $query->when($filters['search'] ?? false , function($query, $search){
           $query->where(function($query) use($search) {
               $query->where('model','like','%'.$search.'%');
           });
       });
   }
}

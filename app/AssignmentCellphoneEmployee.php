<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cellphone;
use App\Employee;

class AssignmentCellphoneEmployee extends Model
{
    protected $fillable = [
        'cellphone_id',
        'employee_id',
        'status',
        'note'
    ];

   public function cellphone()
   {
      return $this->belongsTo(Cellphone::class);
   }
   public function employee()
   {
      return $this->belongsTo(Employee::class);
   }
   public function scopeFilter($query, $filters)
   {
       $query->when($filters['search'] ?? false , function($query, $search){
           $query->where(function($query) use($search) {
               $query->where('employee_name','like','%'.$search.'%')->with(['cellphone','employee']);
           });
       });
   }
}

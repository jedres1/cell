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
}

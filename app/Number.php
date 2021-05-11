<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Number extends Model
{
    protected $fillable = [
        'number',
        'company_id',
        'status',
        'data_plan'
    ];

    public function company()
    {
       return $this->BelongsTo(Company::class);
    }
}

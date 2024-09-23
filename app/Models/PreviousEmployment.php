<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousEmployment extends Model
{
    use HasFactory;

    protected $fillable = [
        "employee_id",
        "company_id",
    ];

    public function company()
    {
        return $this->belongsTo(Company::class)->withTrashed();
    }
}

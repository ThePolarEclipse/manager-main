<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "first_name",
        "last_name",
        "company_id",
        "email",
        "telephone"
    ];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($employee) {
            $prev_company_id = $employee->fresh()->company_id;
            if ($prev_company_id != $employee->company_id) {
                PreviousEmployment::create([
                    'employee_id' => $employee->id,
                    'company_id' => $prev_company_id,
                ]);
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class)->withTrashed();
    }

    public function employmentHistory()
    {
        return $this->hasMany(PreviousEmployment::class)->latest()->with('company');
    }
}

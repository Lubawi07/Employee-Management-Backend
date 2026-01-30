<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendances extends Model
{
    protected $table = 'attendances';
    protected $fillable = [
        'employee_id',
        'attendance_date',
        'check_in',
        'check_out',
        'status'
    ];

    public function employee(){
        return $this->belongsTo(employees::class, 'employee_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class leaves extends Model
{
    protected $table = 'leaves';
    protected $fillable = [
        'employee_id',
        'leave_type',
        'start_date',
        'end_date',
        'persetujuan',
        'approve_by',
        'reason',
    ];

    public function employee (){
        return $this->belongsTo(employees::class, 'employee_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'approve_by');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'user_id',
        'gender',
        'position_id',
        'department_id',
        'join_date'
    ];

    public function attendance(){
        return $this->hasMany(attendances::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function getEmployeename(){
    //     return $this->user->name;
    // }

    public function position(){
        return $this->belongsTo(positions::class, 'position_id');
    }

    public function department(){
        return $this->belongsTo(departments::class, 'department_id');
    }

    public function leaves(){
        return $this->hasMany(leaves::class, );
    }
}

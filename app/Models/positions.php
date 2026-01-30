<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class positions extends Model
{
    protected $table = 'positions';
    protected $fillable = [
        'name',
        'department_id'
    ];

    public function department(){
        return $this->belongsTo(departments::class, 'department_id');
    }

    public function employee(){
        return $this->hasMany(employees::class);
    }
}

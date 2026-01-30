<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = [
        'name',
        'code'
    ];

    public function postion(){
        return $this->hasMany(positions::class);
    }

    public function employee(){
        return $this->hasMany(employees::class);
    }
}

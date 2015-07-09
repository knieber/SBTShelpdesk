<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $fillable = ['department', 'department_code'];

    public function users()
    {
        return $this->hasMany('App\User', 'department_id');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'department_id');
    }
}

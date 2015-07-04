<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name',
        'department',
        'desc',
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }
}

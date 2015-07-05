<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'creator',
        'email',
        'department',
        'desc',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

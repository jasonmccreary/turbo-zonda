<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $casts = [
        'id' => 'integer',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}

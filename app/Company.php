<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
    ];

    public function users()
    {
        return $this->hasMany(\App\User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    protected $table = 'watches';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'video_id',
        'completed_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'video_id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'completed_at',
        'created_at',
        'updated_at',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}

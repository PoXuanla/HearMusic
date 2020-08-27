<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    //
    protected $table = 'music';

    protected $fillable = [
      'user_id',
        'category_id',
        'name',
        'introduction',
        'lyric',
        'status',
    ];
}

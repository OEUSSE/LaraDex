<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    protected $table = 'test';

    protected $casts = [
        'data' => 'array'
    ];
}

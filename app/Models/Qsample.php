<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Qsample extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'title',
    ];
}

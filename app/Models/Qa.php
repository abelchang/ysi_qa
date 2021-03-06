<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Qa extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = [
        'name', 'questions',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

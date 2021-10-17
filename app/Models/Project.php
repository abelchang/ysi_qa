<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Project extends Model
{
    use HybridRelations;

    protected $connection = 'mysql';

    protected $fillable = ['start', 'end', 'company_id', 'name'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function linkcodes()
    {
        return $this->hasMany(Linkcode::class);
    }

    public function qa()
    {
        return $this->hasOne(Qa::class);
    }

}

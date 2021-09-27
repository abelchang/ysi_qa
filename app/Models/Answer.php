<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['score', 'qnumber'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function linkcode()
    {
        return $this->belongsTo(Linkcode::class);
    }
}

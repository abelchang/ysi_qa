<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linkcode extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'count', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

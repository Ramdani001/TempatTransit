<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresModels extends Model
{
    use HasFactory;


    protected $table = "progres";
    protected $guard = [];

    public function project()
    {
        return $this->hasMany(Project::class, 'project_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "tb_client";
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'details',
        'prices',
    ];

    public function project()
    {
        return $this->hasMany(Project::class, 'user_id', 'id');
        return $this->belongsTo(Project::class, 'status', 'id');


    }
}

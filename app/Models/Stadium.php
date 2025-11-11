<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;

    public function club(){
        return $this->hasOne(Club::class);
    }

    public function fixtures(){
        return $this->hasMany(Fixture::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}

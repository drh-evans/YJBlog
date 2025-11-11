<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function fixtures(){
        return $this->belongsToMany(Fixture::class);
    }

    public function club(){
        return $this->belongsTo(Club::class);
    }
}
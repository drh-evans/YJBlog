<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public function stadium(){
        return $this->belongsTo(Stadium::class);
    }

    public function profiles(){
        return $this->hasMany(Profile::class);
    }

    public function fixtures(){
        return $this->hasMany(Fixture::class);
    }

    public function players(){
        return $this->hasMany(Player::class);
    }
}

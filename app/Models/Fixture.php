<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    public function stadium() {
        return $this->belongsTo(Stadium::class);
    }

    public function players() {
        return $this->belongsToMany(Player::class);
    }

    public function club(){
        return $this->belongsTo(Club::class);
    }
}

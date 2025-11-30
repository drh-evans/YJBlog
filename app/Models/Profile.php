<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'display_name',
        'description',
        'favourite_club_id',
        'role',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function club(){
        return $this->belongsTo(Club::class);
    }
}

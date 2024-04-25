<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmCast extends Model
{
    use HasFactory;
    protected $table = 'film_cast';
    protected $fillable = ['cast_member_id','film_id'];
}

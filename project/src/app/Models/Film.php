<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'title_uk',
        'title_en',
        'description_uk',
        'description_en',
        'poster',
        'youtube_trailer_id',
        'release_year',
        'start_date',
        'end_date',
    ];

    public function castMembers()
    {
        return $this->belongsToMany(CastMember::class, 'film_cast', 'film_id', 'cast_member_id');
    }

    public function tags()
    {
        return $this->hasMany(FilmTag::class);
    }

    public function images()
    {
        return $this->hasMany(FilmImage::class);
    }

    public function getTranslatedAttribute($attribute)
    {
        $locale = app()->getLocale();

        switch ($locale) {
            case 'uk':
                return $this->{$attribute . '_uk'};
                break;
            default:
                return $this->{$attribute . '_en'};
                break;
        }
    }

}

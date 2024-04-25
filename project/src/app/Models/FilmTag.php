<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmTag extends Model
{
    use HasFactory;

    protected $table='tags_for_films';

    protected $fillable = [
        'tag_name_uk',
        'tag_name_en',
        'slug_uk',
        'slug_en',
        'film_id',
    ];

    public function film(){
        return $this->belongsTo(Film::class);
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

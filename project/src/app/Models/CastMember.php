<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastMember extends Model
{
    use HasFactory;

    protected $fillable = ['name_uk','name_en','type','photo'];

    public static function getTranslatedType($type)
    {
        return __('messages.' . $type);
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

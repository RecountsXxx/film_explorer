<?php

namespace App\Http\Requests\Admin\Film;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_uk' => 'required|string',
            'title_en' => 'required|string',
            'description_uk' => 'required|string',
            'description_en' => 'required|string',
            'poster' => 'required|image|max:8148',
            'youtube_trailer_id' => 'required|string',
            'release_year' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'cast_member_id' => 'required|array|min:1|max:100',
            'cast_member_id.*' => 'exists:cast_members,id|required',
            'images.*' => 'image|max:8148|required',
        ];
    }
}

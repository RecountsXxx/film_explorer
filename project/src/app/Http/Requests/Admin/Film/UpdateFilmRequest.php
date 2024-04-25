<?php

namespace App\Http\Requests\Admin\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_uk' => 'string',
            'title_en' => 'string',
            'description_uk' => 'string',
            'description_en' => 'string',
            'poster' => 'image',
            'youtube_trailer_id' => 'nullable|string',
            'release_year' => 'required|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'cast_member_id' => 'array|min:1|max:100',
            'cast_member_id.*' => 'exists:cast_members,id',
            'new_images.*' => 'image|max:2048',
            'status'=>'in:Show,Hide',
        ];
    }
}

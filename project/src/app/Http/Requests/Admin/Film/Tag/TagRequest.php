<?php

namespace App\Http\Requests\Admin\Film\Tag;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tag_name_uk' => 'required|string',
            'tag_name_en' => 'required|string',
            'slug_uk' => 'required|string',
            'slug_en' => 'required|string',
            'film_id' => 'required|exists:films,id',
        ];
    }
}

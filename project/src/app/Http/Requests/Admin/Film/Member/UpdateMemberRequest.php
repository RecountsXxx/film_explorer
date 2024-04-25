<?php

namespace App\Http\Requests\Admin\Film\Member;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_uk' => 'string',
            'name_en' => 'string',
            'photo' => 'image',
            'type' => 'string',
        ];
    }
}

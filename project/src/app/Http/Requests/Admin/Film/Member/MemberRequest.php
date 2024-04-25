<?php

namespace App\Http\Requests\Admin\Film\Member;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_uk' => 'required|string',
            'name_en' => 'required|string',
            'photo' => 'required|image',
            'type' => 'required|string',
        ];
    }
}

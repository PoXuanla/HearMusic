<?php

namespace App\Http\Requests\AccountSetting\BasicInformation;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required | max:10',
            'personImage' => 'image | max:200',
            'coverImage' => 'image | max:200',
            'intro' => 'max:1000',
        ];
    }

    public function messages()
    {
        return [
            "required" => "此欄位必須填寫",
            "image" => '必須是圖片',
            "name.max" => '字數要在10個字以內',
            "personImage.max" => "圖片要小於2MB",
            "coverImage.max" => "圖片要小於2MB",
            "intro.max" => "字數要在1000字以內",
        ];
    }
}

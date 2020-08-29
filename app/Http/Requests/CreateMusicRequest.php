<?php


namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class CreateMusicRequest extends FormRequest
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
            'mp3' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'songName' => 'required',
            'songIntro' => 'required',
            'lyrics' => 'required',
            'img' => 'image | max:20000',
            'category' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            "required" => "此欄位必須填寫",
            "image" => '必須是圖片',
            "mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav" => '必須是MP3',
            "img.max" => "圖片要小於2MB",
        ];
    }
}

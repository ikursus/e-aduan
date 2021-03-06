<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AduanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_pengadu' => ['required'],
            'email_pengadu' => ['required', 'email:filter'],
            'aduan' => ['required'],
            'user_id' => ['required'],
            'fail' => ['sometimes', 'nullable', 'mimes:png,jpg,bmp,jpeg', 'max:2000']
        ];
    }
}

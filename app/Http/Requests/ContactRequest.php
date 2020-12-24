<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'subject' => 'required|min:5|max:50',
            'message' => 'required|min:15|max:500',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Имя не может быть пустым',
            'email.required' => 'Имя не может быть пустым',
            'email.email' => 'Некорректный email',
            'subject.required' => 'Имя не может быть пустым',
            'message.required' => 'Имя не может быть пустым',
            'subject.min' => 'Тема не может быть меньше 5-и символов',
            'subject.max' => 'Тема не может быть больше 50-и символов',
            'message.min' => 'Сообщение не может быть меньше 15-и символов',
            'message.max' => 'Сообщение не может быть больше 500 символов',
        ];
    }
}

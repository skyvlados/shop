<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=> [
                'required',
                'alpha_dash',
                'min:2',
                Rule::unique('countries','name')
                    ->ignore($this->route('country'))
                    ->whereNull('deleted_at')
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__('Название страны обязательно для заполнения'),
            'name.alpha'=>__('Название страны должно содержать только буквы'),
            'name.between'=>__('Название страны должно содержать больше 2-х символов и менее 15'),
            'name.unique'=>__('Такое название уже существует')
        ];
    }
}

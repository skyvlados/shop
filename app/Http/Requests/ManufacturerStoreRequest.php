<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ManufacturerStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>[
                'required',
                'alpha_dash',
                'min:2',
                Rule::unique('manufacturers','name')->whereNull('deleted_at')
            ],
            'country_id'=>'required|exists:countries,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__('Название производителя обязательно для заполнения'),
            'name.alpha_dash'=>__('Название производителя должно содержать только буквенно-цифровые символы, а также дефисы и символы подчеркивания'),
            'name.min'=>__('Название производителя должно содержать больше 1-го символа'),
            'name.unique'=>__('Такой производитель уже существует'),
            'country_id.required'=>__('Выберете страну'),
            'country_id.exists'=>__('Выбранная страна не существует'),
        ];
    }
}

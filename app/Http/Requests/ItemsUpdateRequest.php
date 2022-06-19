<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemsUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>[
                'required',
                'alpha_dash',
                'min:2',
                Rule::unique('items','name')
                    ->ignore($this->route('item'))
                    ->whereNull('deleted_at')
            ],
            'price'=>'required|numeric',
            'manufacturer_id'=>'required|exists:manufacturers,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__('Название товара обязательно для заполнения'),
            'name.alpha_dash'=>__('Название товара должно содержать только буквенно-цифровые символы, а также дефисы и символы подчеркивания'),
            'name.min'=>__('Название товара должно содержать больше 1-го символа'),
            'name.unique'=>__('Такой товар уже существует'),
            'price.required'=>__('Заполните сумму'),
            'price.numeric'=>__('Значение должно быть числового формата'),
            'manufacturer_id.required'=>__('Выберете производителя'),
            'manufacturer_id.exists'=>__('Выбранный производитель не существует'),
        ];
    }
}

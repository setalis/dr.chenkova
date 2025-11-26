<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'messenger' => ['required', 'string', Rule::in(['telegram', 'instagram', 'whatsapp'])],
            'contact' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'region' => ['nullable', 'string', 'max:255'],
            'address_1' => ['required', 'string', 'max:500'],
            'address_2' => ['nullable', 'string', 'max:500'],
            'zip' => ['required', 'string', 'max:20'],
            'phone' => ['required', 'string', 'max:20'],
            'privacy_agreement' => ['required', 'accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения.',
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать 255 символов.',
            'messenger.required' => 'Выберите мессенджер.',
            'messenger.in' => 'Выбран некорректный мессенджер.',
            'contact.required' => 'Контактные данные обязательны для заполнения.',
            'contact.string' => 'Контактные данные должны быть строкой.',
            'contact.max' => 'Контактные данные не должны превышать 255 символов.',
            'country.required' => 'Страна обязательна для заполнения.',
            'country.string' => 'Страна должна быть строкой.',
            'country.max' => 'Страна не должна превышать 255 символов.',
            'city.required' => 'Город обязателен для заполнения.',
            'city.string' => 'Город должен быть строкой.',
            'city.max' => 'Город не должен превышать 255 символов.',
            'region.string' => 'Регион должен быть строкой.',
            'region.max' => 'Регион не должен превышать 255 символов.',
            'address_1.required' => 'Адрес 1 обязателен для заполнения.',
            'address_1.string' => 'Адрес 1 должен быть строкой.',
            'address_1.max' => 'Адрес 1 не должен превышать 500 символов.',
            'address_2.string' => 'Адрес 2 должен быть строкой.',
            'address_2.max' => 'Адрес 2 не должен превышать 500 символов.',
            'zip.required' => 'Индекс (ZIP) обязателен для заполнения.',
            'zip.string' => 'Индекс (ZIP) должен быть строкой.',
            'zip.max' => 'Индекс (ZIP) не должен превышать 20 символов.',
            'phone.required' => 'Номер телефона обязателен для заполнения.',
            'phone.string' => 'Номер телефона должен быть строкой.',
            'phone.max' => 'Номер телефона не должен превышать 20 символов.',
            'privacy_agreement.required' => 'Необходимо согласие на обработку персональных данных.',
            'privacy_agreement.accepted' => 'Необходимо согласие на обработку персональных данных.',
        ];
    }
}

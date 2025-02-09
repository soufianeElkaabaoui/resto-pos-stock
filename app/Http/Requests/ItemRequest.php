<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'item_name' => [
                'required',
                'unique:items',
            ],
            'item_description' => [
                'sometimes',
                'string',
            ],
            'unit' => [
                'sometimes',
                'string',
            ],
            'menu' => [
                'sometimes',
                'integer',
                'exists:menus,id',
            ],
        ];
        if ($this->method() == Request::METHOD_PUT) {
            $rules['item_name'][1] = Rule::unique('items')->ignore($this->route()->parameter('item'));
        }
        return $rules;
    }
}

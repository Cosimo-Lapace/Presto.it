<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        return [
            'title'=> 'required|max:50',
            'category' => 'required|max:50',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'body' => 'required|max:150'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'=>'il campo è obbligatorio',
            'category.required'=>'il campo è obbligatorio',
            'body.required'=>'il campo è obbligatorio',
            'price.regex'=>'il campo deve essere un numero decimale con al massimo due cifre decimali'
        ];
    }
}

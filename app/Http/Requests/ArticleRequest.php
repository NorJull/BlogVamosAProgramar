<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        //Revisar el Request de el Content
        return [
            'title'  => 'max:250|required|unique:articles',
            'category_id' => 'required',
            'content' => 'min:2|required',
            'image' => 'required'
        ];
    }
}

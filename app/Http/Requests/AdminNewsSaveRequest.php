<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminNewsSaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:10|max:50|unique:news',
            'description' => 'max:1000| required',
            'category_id' => 'required|integer|exists:categories,id',
            'active' => 'boolean',
            'publish_date' => 'date'
        ];
    }

    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }

    public function attributes()
    {
        return [
            'title' =>(__('labels.title'))
        ];
    }


}

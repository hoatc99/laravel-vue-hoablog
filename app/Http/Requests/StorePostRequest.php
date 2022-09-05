<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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

    protected function prepareForValidation() 
    {
        $this->merge([
            'user_id' => 1
            // 'user_id' => $this->user()->id
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'exists:categories,id',
            'user_id' => 'exists:users,id',
            'title' => 'required|string|max:255',
            'image_url' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'is_active' => 'required|boolean',
        ];
    }
}

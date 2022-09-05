<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $post = $this->route('post');
        if ($this->user()->id !== $post->user_id) {
            return false;
        }
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

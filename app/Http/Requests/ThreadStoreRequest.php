<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'max:60', 'min:5'],
            'body' => ['required', 'max:1000', 'min:10'],
            'category' => ['required'],
            'tags' => ['array'],
            'tags.*' => ['exists:tags,id'],
        ];
    }

}

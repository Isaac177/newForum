<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ThreadStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
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

    public function author(): User
    {
        return $this->user();
    }

    public function title(): string
    {
        return $this->get('title');
    }

    public function body(): string
    {
        return $this->get('body');
    }

    public function category(): string
    {
        return $this->get('category');
    }

    public function tags(): array
    {
        return $this->get('tags', []);
    }

}

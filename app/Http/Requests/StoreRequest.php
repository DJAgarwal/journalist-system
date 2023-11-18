<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'headline'      => 'required|string|max:255',
            'location'      => 'required|string|max:255',
            'description'   => 'required|string',
            'published_at'  => 'required|date',
            'image'         => 'nullable|string|max:255',
            'audio'         => 'nullable|string|max:255',
        ];
    }
}
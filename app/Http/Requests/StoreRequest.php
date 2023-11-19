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
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio'         => 'nullable|file|mimes:mp3|max:2048',
            'video'         => 'nullable|file|mimes:mp4,mov,avi,wmv|max:20480',
        ];
    }
}
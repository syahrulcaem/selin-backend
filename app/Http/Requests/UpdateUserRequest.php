<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:100|min:3',
            'nip' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'roles' => 'required|in:ADMIN,STAFF,USER',
            'position' => 'required|max:100|min:3',
            'department' => 'required|max:100|min:3',
            // 'face_embedding' => 'required|max:10000|min:3',
            // 'image_url' => 'required|max:5000|min:3',
            // 'fcm_token' => 'required|max:5000|min:3',

        ];
    }
}

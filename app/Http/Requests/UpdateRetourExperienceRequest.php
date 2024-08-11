<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRetourExperienceRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'libelle' => 'sometimes|string|max:255',
            'image' => 'sometimes|string|max:255',
            'contenu' => 'sometimes|string',
            'user_id' => 'sometimes|exists:users,id',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvenementRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles de validation qui s'appliquent à la requête.
     */
    public function rules(): array
    {
        return [
            'theme' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'lieu' => 'sometimes|required|string|max:255',
            'nombre_places' => 'sometimes|required|integer|min:1',
            'date_debut' => 'sometimes|required|date|before_or_equal:date_fin',
            'date_fin' => 'sometimes|required|date|after_or_equal:date_debut',
            'prix' => 'sometimes|required|integer|min:0',
            'image' => 'sometimes|required|string|max:255',
        ];
    }
}

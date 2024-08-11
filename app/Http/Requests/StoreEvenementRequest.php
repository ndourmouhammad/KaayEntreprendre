<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvenementRequest extends FormRequest
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
            'theme' => 'required|string|max:255',
            'description' => 'required|string',
            'lieu' => 'required|string|max:255',
            'nombre_places' => 'required|integer|min:1',
            'date_debut' => 'required|date|before_or_equal:date_fin',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'prix' => 'required|integer|min:0',
            'image' => 'required|string|max:255',
        ];
    }
}

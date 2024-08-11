<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'theme' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'lieu' => 'sometimes|string|max:255',
            'nombre_places' => 'sometimes|integer|min:1',
            'date_debut' => 'sometimes|date|before_or_equal:date_fin',
            'date_fin' => 'sometimes|date|after_or_equal:date_debut',
            'prix' => 'sometimes|integer|min:0',
            'image' => 'sometimes|mimes:jpeg,jpg,png|max:2048',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'errors'      => $validator->errors()
        ], 422));
    }
}

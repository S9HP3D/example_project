<?php

namespace App\Http\Requests\Guest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
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
            'first_name' =>'required|string|max:255',
            'last_name' =>'required|string|max:255',
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                'unique:guests',

            ],
            'phone' => [
                'required',
                'string',
                'max:20',
                'unique:guests',
            ],
            'country' => 'nullable|string|max:50',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        $response = new Response([
            'error' => 'Validation failed',
            'details' => $errors,
        ], 422);

        throw new ValidationException($validator, $response);
    }

}

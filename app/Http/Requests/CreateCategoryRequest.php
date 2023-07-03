<?php

namespace App\Http\Requests;

use App\Http\Controllers\APIResponseHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;


class CreateCategoryRequest extends FormRequest
{
    use APIResponseHelper;

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:categories,name',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException(
            $validator,
            $this->errorResponse(null, $validator->errors(), 422)
        ));
    }

}
<?php

namespace App\Http\Requests;

use App\Rules\ProductRules;
use App\Traits\APIResponseHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class NewProductFormRequest extends FormRequest
{
    use APIResponseHelper;

    public function rules(): array
    {
        return ProductRules::PRODUCT_CREATE_RULE;
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

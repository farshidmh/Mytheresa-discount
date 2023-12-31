<?php

namespace App\Http\Requests;

use App\Rules\DiscountRules;
use App\Traits\APIResponseHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreateProductDiscountRequest extends FormRequest
{
    use APIResponseHelper;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return DiscountRules::PRODUCT_CREATE_RULE;
    }

    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException(
            $validator,
            $this->errorResponse(null, $validator->errors(), 422)
        ));
    }
}

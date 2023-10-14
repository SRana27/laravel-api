<?php

namespace App\Http\Requests;

use App\Http\Resources\ErrorResource;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


     public function rules(): array
        {
        return ['name' => 'required|string|unique:categories,name' .$this->id];
        }
    protected function failedValidation(Validator $validator)
    {
        $response= (new ErrorResource($validator->getMessageBag()))->response()->setStatusCode(422);
        throw new ValidationException($validator,$response);


    }

}

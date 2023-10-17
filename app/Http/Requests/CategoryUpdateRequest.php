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
<<<<<<< HEAD
        $response= (new ErrorResource($validator->getMessageBag()))->response()->setStatusCode(422);
=======
        $response= (new ErrorResource($validator->errors()))->response()->setStatusCode(422);
>>>>>>> 66a1a1c318e5be4068f2f7211baa4296f9198c83
        throw new ValidationException($validator,$response);


    }

}

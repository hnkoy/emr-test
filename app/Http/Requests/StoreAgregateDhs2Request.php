<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAgregateDhs2Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dataSet' => ['required', 'string'],
            'completeDate' => ['nullable', 'string'],
            'period' => ['nullable', 'string'],
            'orgUnit' => ['nullable', 'string'],
            'dataValues' => ['required', 'array', 'min:1'],
            'dataValues.*.dataElement' => ['required', 'string'],
            'dataValues.*.value' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'dataSet.required' => 'The dataSet field is required.',
            'dataSet.string' => 'The dataSet must be a string.',
            'completeDate.string' => 'The completeDate must be a string (YYYY-MM-DD).',
            'period.string' => 'The period must be a string (YYYYMM).',
            'orgUnit.string' => 'The orgUnit must be a string.',
            'dataValues.required' => 'The dataValues field is required.',
            'dataValues.array' => 'The dataValues field must be an array of objects.',
            'dataValues.min' => 'The dataValues array must contain at least one item.',
            'dataValues.*.dataElement.required' => 'Each dataValues item must include a dataElement.',
            'dataValues.*.dataElement.string' => 'Each dataElement must be a string.',
            'dataValues.*.value.required' => 'Each dataValues item must include a value.',
        ];
    }



    public function failedValidation(Validator $validator){

         throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ], 400));

    }
}

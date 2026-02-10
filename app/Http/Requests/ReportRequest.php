<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
{
    if ($this->has('body') && is_array($this->body)) {
        $this->merge($this->body);
    }
}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'report_name' => ['nullable', 'string'],
        'report_month' => ['nullable', 'integer', 'between:1,12'],
        'report_year' => ['nullable', 'integer', 'between:2000,2100'],
        ];
    }
}

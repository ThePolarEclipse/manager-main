<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{

    // Define the TELE_REGEX constant
    private const TELE_REGEX = '/^[0-9]{10,15}$/'; // Example for 10-15 digits, customize as needed



    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd('nullable|regex:' . StoreEmployeeRequest::TELE_REGEX);
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'telephone' => ['nullable', 'regex:' . self::TELE_REGEX],
            'company_id' => ['nullable', Rule::exists('companies', 'id')],
        ];
    }
}

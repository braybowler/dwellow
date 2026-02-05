<?php

namespace App\Http\Requests\WaitlistedUser;

use Illuminate\Foundation\Http\FormRequest;

class StoreWaitlistedUserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:waitlisted_users,email',
            'type' => 'required|string',
            'number_of_properties' => 'required|string'
        ];
    }
}

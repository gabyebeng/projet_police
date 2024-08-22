<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|unique:users,name',
            'email'=>'required|unique:users,email',
        ];
    }
    public function messages(){
        return[
            'name.unique'=>'un user portant ce nom existe déjà, choisissez un autre nom!',
            'email.unique'=>'Cette adresse mail est déjà attachée à un compte',
        ];
    }
}

<?php

namespace App\Http\Requests\Api;

class ContactRequest extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ];
    }

    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData()
    {
        $input = [
            'firstname' => cleanup($this->input('firstname')),
            'lastname' => cleanup($this->input('lastname')),
            'email' => cleanup($this->input('email')),
            'profile_photo' => cleanup($this->file('profile_photo')),
            'is_favorite' => cleanup($this->input('is_favorite')),
            'numbers' => $this->input('numbers'),
        ];

        return $input;
    }

}

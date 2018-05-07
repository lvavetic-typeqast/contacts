<?php

namespace App\Http\Requests;

class PhoneNumberRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contact_id' => 'required|exists:contact,id',
            'number' => 'required',
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
            'contact_id' => $this->input('contact_id'),
            'number' => $this->input('number'),
            'label' => $this->input('label'),
        ];

        return $input;
    }

}

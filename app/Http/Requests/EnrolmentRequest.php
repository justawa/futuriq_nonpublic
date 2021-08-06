<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrolmentRequest extends FormRequest
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
            'type' => 'required',
            'certification_class' => 'required',
            'user_type' => 'required',
            'validity' => 'required',
            'nationality' => 'required',
            'ekyc_type' => 'required',
            'pan' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'pincode' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'remark' => 'required',
            'ekyc_pin' => 'required',
            'photo_file' => 'required|file',
            'pan_file' => 'required|file',
            'address_file' => 'required|file',
        ];
    }
}

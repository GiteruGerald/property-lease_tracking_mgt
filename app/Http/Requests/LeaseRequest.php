<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaseRequest extends FormRequest
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
            'fname'=> ['string', 'required'],
            'lname'=> ['string', 'required'],
            'email'=> ['string', 'required'],
            'phone'=> ['string', 'required'],
            'start'=> ['string', 'required'],
            'duration'=> ['numeric','required'],
            'property_id'=> ['numeric','required', 'unique:leases'],
            'rent'=> ['numeric','required'],
            'deposit'=> ['numeric','required'],
            'type'=> ['string','required'],
        ];
    }
}

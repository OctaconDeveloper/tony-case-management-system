<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createCourtRequest extends FormRequest
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
            "type" => "required",
            "address" => "required",
            "town" => "required",
            "state" => "required",
            'court_judge' => 'required|unique:court_users,user_id|exists:users,id',
            "court_registrar" => "required|exists:users,id",
        ];
    }
}

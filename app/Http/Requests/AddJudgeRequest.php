<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddJudgeRequest extends FormRequest
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
           'court_id' => 'required|exists:courts,id',
            'court_judge' => 'required|unique:court_users,user_id|exists:users,id'
        ];
    }
}

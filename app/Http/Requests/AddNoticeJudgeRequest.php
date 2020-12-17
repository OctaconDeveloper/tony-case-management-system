<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNoticeJudgeRequest extends FormRequest
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
            "notice_id" => "required|numeric|exists:notices,id",
            "notice_case_file" => "required|string",
            "court_judge" => "required|numeric|exists:users,id",
        ];
    }
}

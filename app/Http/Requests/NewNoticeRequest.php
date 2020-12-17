<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewNoticeRequest extends FormRequest
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
            "court" => "required|numeric|exists:courts,id",
            "date_of_appearance" => "required|date",
            "plaintiffs" => "required",
            "plaintiffs_counsel" => "required",
            "plaintiffs_counsel_chanber" => "required",
            "defendants" => "required",
            "title_of_notice" => "required",
            "description" => "required",
            "case_type" => "required|numeric|exists:case_categories,id"
        ];
    }
}

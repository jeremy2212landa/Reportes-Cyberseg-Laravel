<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CveUpdateRequest extends FormRequest
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
            'cve_code' => ['required', 'string'],
            'cvss' => ['required', 'integer'],
            'nessus_cod' => ['required', 'string'],
            'nmap_cod' => ['required', 'string'],
            'en_description' => ['required', 'string'],
            'es_description' => ['required', 'string'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Controller\PresensiController;
use Illuminate\Foundation\Http\FormRequest;

class PresensiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => [
                'min:3',
                'required',
                'regex:/^[\w-]*$/'
            ],
            'jam_masuk' => [
                'required'
            ],
            'lokasi_masuk' => [
                'min:5',
                // 'required',
                // 'regex:/^[\w-]*$/'
            ]
        ];
    }
}

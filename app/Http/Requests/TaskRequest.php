<?php

namespace App\Http\Requests;

use App\Http\Controller\TaskController;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'username' => [
                'min:6',
                'required',
                'regex:/^[\w-]*$/'
            ],

            'task' => [
                'min:3',
                'required',
            ]

        ];
    }
}

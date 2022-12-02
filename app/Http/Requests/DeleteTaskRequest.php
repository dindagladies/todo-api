<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteTaskRequest extends FormRequest
{
    public function rules()
    {
        $status = ['COMPLETED', 'ACTIVE'];

        return [
            'id' => ['sometimes', 'integer', 'min:1'],
            'status' => ['sometimes', 'string', Rule::in($status)],
        ];
    }
}

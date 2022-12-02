<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    public function rules()
    {
        $status = ['COMPLETED', 'ACTIVE'];

        return [
            'name' => ['sometimes', 'string', 'min:1'],
            'status' => ['required', 'string', Rule::in($status)],
        ];
    }
}

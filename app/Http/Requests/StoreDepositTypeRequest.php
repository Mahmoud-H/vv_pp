<?php

namespace App\Http\Requests;

use App\Models\DepositType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepositTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('deposit_type_create');
    }

    public function rules()
    {
        return [
            'deposit_type_desc' => [
                'string',
                'max:150',
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Visitor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVisitorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('visitor_edit');
    }

    public function rules()
    {
        return [
            'visitor_id_num' => [
                'string',
                'max:10',
                'required',
            ],
            'visitor_name'   => [
                'string',
                'max:120',
                'required',
            ],
            'mobile_num'     => [
                'string',
                'max:15',
                'nullable',
            ],
            'governorate_id' => [
                'required',
                'integer',
            ],
            'in_date_time'   => [
                 'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'out_date_time'  => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'notes'          => [
                'string',
                'max:250',
                'nullable',
            ],
        ];
    }
}

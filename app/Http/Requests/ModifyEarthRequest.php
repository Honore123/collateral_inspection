<?php

namespace App\Http\Requests;

use App\Earth;
//use App\Models\Earth;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class ModifyEarthRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('earth_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'comment' => 'required',
        ];

    }
}

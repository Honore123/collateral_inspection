<?php

namespace App\Http\Requests;

use App\Property;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePropertyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'builtUpArea'     => [
                'required'],
            'foundation' => [
                'required'],
            'elevation'    => [
                'required'],
        ];

    }
}

<?php

namespace App\Http\Requests;

use App\Earth;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEarthRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('earth_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'users_id'     => [
                'required'],
            'propertyUPI'    => [
                'required',
                'unique:earths'],
            'inspectionDate' => [
                'required'],
            'propertyOwner'    => [
                'required'],
        ];

    }
}

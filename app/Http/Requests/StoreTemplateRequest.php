<?php

namespace App\Http\Requests;

use App\Models\Template;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTemplateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('template_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'html' => [
                'string',
                'required',
            ],
            'json' => [
                'string',
                'required',
            ],
        ];
    }
}

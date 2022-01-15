<?php

namespace App\Http\Requests;

use App\Models\Promotion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePromotionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('promotion_create'),
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
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'template_id' => [
                'integer',
                'exists:templates,id',
                'required',
            ],
            'promotion.published_at' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'is_global_list' => [
                'boolean',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Offer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOfferRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('offer_create'),
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
            'is_active' => [
                'boolean',
            ],
            'offer.expired_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'duration_days' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'template_id' => [
                'integer',
                'exists:templates,id',
                'nullable',
            ],
        ];
    }
}

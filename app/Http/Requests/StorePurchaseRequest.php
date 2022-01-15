<?php

namespace App\Http\Requests;

use App\Models\Purchase;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurchaseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('purchase_create'),
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
            'product_id' => [
                'integer',
                'exists:products,id',
                'required',
            ],
            'purchase.activated_at' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'purchase.deactivated_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }
}

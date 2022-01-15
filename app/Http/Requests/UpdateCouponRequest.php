<?php

namespace App\Http\Requests;

use App\Models\Coupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCouponRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('coupon_edit'),
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
            'code' => [
                'string',
                'min:8',
                'max:8',
                'required',
            ],
            'coupon.expired_at' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'coupon.redeemed_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'offer_id' => [
                'integer',
                'exists:offers,id',
                'nullable',
            ],
        ];
    }
}

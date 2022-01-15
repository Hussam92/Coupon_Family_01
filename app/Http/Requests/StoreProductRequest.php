<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('product_create'),
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
            'description' => [
                'string',
                'nullable',
            ],
            'price' => [
                'numeric',
                'required',
            ],
            'max_coupons_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'max_offers_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'max_newsletter_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'max_promotions_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'max_members_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'max_newsletter_global' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'max_promotions_global' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Newsletter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsletterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('newsletter_edit'),
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
            'template_id' => [
                'integer',
                'exists:templates,id',
                'nullable',
            ],
            'newsletter.planned_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}

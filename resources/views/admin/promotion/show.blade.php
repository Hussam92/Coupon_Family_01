@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.promotion.title_singular') }}:
                    {{ trans('cruds.promotion.fields.id') }}
                    {{ $promotion->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.promotion.fields.id') }}
                            </th>
                            <td>
                                {{ $promotion->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promotion.fields.title') }}
                            </th>
                            <td>
                                {{ $promotion->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promotion.fields.description') }}
                            </th>
                            <td>
                                {{ $promotion->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promotion.fields.template') }}
                            </th>
                            <td>
                                @if($promotion->template)
                                    <span class="badge badge-relationship">{{ $promotion->template->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promotion.fields.published_at') }}
                            </th>
                            <td>
                                {{ $promotion->published_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.promotion.fields.is_global_list') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $promotion->is_global_list ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('promotion_edit')
                    <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
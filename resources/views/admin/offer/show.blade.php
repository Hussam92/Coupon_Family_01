@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.offer.title_singular') }}:
                    {{ trans('cruds.offer.fields.id') }}
                    {{ $offer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.offer.fields.id') }}
                            </th>
                            <td>
                                {{ $offer->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.offer.fields.title') }}
                            </th>
                            <td>
                                {{ $offer->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.offer.fields.description') }}
                            </th>
                            <td>
                                {{ $offer->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.offer.fields.is_active') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $offer->is_active ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.offer.fields.expired_at') }}
                            </th>
                            <td>
                                {{ $offer->expired_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.offer.fields.duration_days') }}
                            </th>
                            <td>
                                {{ $offer->duration_days }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.offer.fields.template') }}
                            </th>
                            <td>
                                @if($offer->template)
                                    <span class="badge badge-relationship">{{ $offer->template->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('offer_edit')
                    <a href="{{ route('admin.offers.edit', $offer) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
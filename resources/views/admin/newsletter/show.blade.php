@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.newsletter.title_singular') }}:
                    {{ trans('cruds.newsletter.fields.id') }}
                    {{ $newsletter->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.newsletter.fields.id') }}
                            </th>
                            <td>
                                {{ $newsletter->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.newsletter.fields.template') }}
                            </th>
                            <td>
                                @if($newsletter->template)
                                    <span class="badge badge-relationship">{{ $newsletter->template->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.newsletter.fields.planned_at') }}
                            </th>
                            <td>
                                {{ $newsletter->planned_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.newsletter.fields.title') }}
                            </th>
                            <td>
                                {{ $newsletter->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.newsletter.fields.is_global_list') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $newsletter->is_global_list ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('newsletter_edit')
                    <a href="{{ route('admin.newsletters.edit', $newsletter) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.newsletters.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
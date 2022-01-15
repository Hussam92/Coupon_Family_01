@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.template.title_singular') }}:
                    {{ trans('cruds.template.fields.id') }}
                    {{ $template->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.template.fields.id') }}
                            </th>
                            <td>
                                {{ $template->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.template.fields.name') }}
                            </th>
                            <td>
                                {{ $template->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.template.fields.html') }}
                            </th>
                            <td>
                                {{ $template->html }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.template.fields.json') }}
                            </th>
                            <td>
                                {{ $template->json }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('template_edit')
                    <a href="{{ route('admin.templates.edit', $template) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.templates.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
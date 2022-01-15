@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.teamRole.title_singular') }}:
                    {{ trans('cruds.teamRole.fields.id') }}
                    {{ $teamRole->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.teamRole.fields.id') }}
                            </th>
                            <td>
                                {{ $teamRole->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.teamRole.fields.title') }}
                            </th>
                            <td>
                                {{ $teamRole->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.teamRole.fields.permissions') }}
                            </th>
                            <td>
                                @foreach($teamRole->permissions as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('team_role_edit')
                    <a href="{{ route('admin.team-roles.edit', $teamRole) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.team-roles.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
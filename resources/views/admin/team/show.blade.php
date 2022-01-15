@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.team.title_singular') }}:
                    {{ trans('cruds.team.fields.id') }}
                    {{ $team->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.id') }}
                            </th>
                            <td>
                                {{ $team->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.name') }}
                            </th>
                            <td>
                                {{ $team->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.owner') }}
                            </th>
                            <td>
                                @if($team->owner)
                                    <span class="badge badge-relationship">{{ $team->owner->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.code') }}
                            </th>
                            <td>
                                {{ $team->code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.city') }}
                            </th>
                            <td>
                                {{ $team->city }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.phone') }}
                            </th>
                            <td>
                                {{ $team->phone }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.domain') }}
                            </th>
                            <td>
                                {{ $team->domain }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $team->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $team->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.street') }}
                            </th>
                            <td>
                                {{ $team->street }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.banner') }}
                            </th>
                            <td>
                                @foreach($team->banner as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.team.fields.icon') }}
                            </th>
                            <td>
                                @foreach($team->icon as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('team_edit')
                    <a href="{{ route('admin.teams.edit', $team) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
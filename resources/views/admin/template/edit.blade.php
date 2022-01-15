@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.template.title_singular') }}:
                    {{ trans('cruds.template.fields.id') }}
                    {{ $template->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('template.edit', [$template])
        </div>
    </div>
</div>
@endsection
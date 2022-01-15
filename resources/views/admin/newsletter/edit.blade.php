@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.newsletter.title_singular') }}:
                    {{ trans('cruds.newsletter.fields.id') }}
                    {{ $newsletter->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('newsletter.edit', [$newsletter])
        </div>
    </div>
</div>
@endsection
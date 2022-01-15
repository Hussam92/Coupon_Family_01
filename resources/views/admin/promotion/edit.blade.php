@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.promotion.title_singular') }}:
                    {{ trans('cruds.promotion.fields.id') }}
                    {{ $promotion->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('promotion.edit', [$promotion])
        </div>
    </div>
</div>
@endsection
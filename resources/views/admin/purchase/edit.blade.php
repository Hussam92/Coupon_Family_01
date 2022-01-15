@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.purchase.title_singular') }}:
                    {{ trans('cruds.purchase.fields.id') }}
                    {{ $purchase->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('purchase.edit', [$purchase])
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.purchase.title_singular') }}:
                    {{ trans('cruds.purchase.fields.id') }}
                    {{ $purchase->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.purchase.fields.id') }}
                            </th>
                            <td>
                                {{ $purchase->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.purchase.fields.activated_at') }}
                            </th>
                            <td>
                                {{ $purchase->activated_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.purchase.fields.deactivated_at') }}
                            </th>
                            <td>
                                {{ $purchase->deactivated_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.purchase.fields.product') }}
                            </th>
                            <td>
                                @if($purchase->product)
                                    <span class="badge badge-relationship">{{ $purchase->product->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('purchase_edit')
                    <a href="{{ route('admin.purchases.edit', $purchase) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
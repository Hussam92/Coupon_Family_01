@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.product.title_singular') }}:
                    {{ trans('cruds.product.fields.id') }}
                    {{ $product->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.id') }}
                            </th>
                            <td>
                                {{ $product->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.name') }}
                            </th>
                            <td>
                                {{ $product->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.description') }}
                            </th>
                            <td>
                                {{ $product->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.price') }}
                            </th>
                            <td>
                                {{ $product->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.photo') }}
                            </th>
                            <td>
                                @foreach($product->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.max_coupons_count') }}
                            </th>
                            <td>
                                {{ $product->max_coupons_count }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.max_offers_count') }}
                            </th>
                            <td>
                                {{ $product->max_offers_count }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.max_newsletter_count') }}
                            </th>
                            <td>
                                {{ $product->max_newsletter_count }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.max_promotions_count') }}
                            </th>
                            <td>
                                {{ $product->max_promotions_count }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.max_members_count') }}
                            </th>
                            <td>
                                {{ $product->max_members_count }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.max_newsletter_global') }}
                            </th>
                            <td>
                                {{ $product->max_newsletter_global }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.product.fields.max_promotions_global') }}
                            </th>
                            <td>
                                {{ $product->max_promotions_global }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('product_edit')
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
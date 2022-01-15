<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('product.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.product.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="product.name">
        <div class="validation-message">
            {{ $errors->first('product.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.product.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="product.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('product.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.price') ? 'invalid' : '' }}">
        <label class="form-label required" for="price">{{ trans('cruds.product.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" required wire:model.defer="product.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('product.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.product_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="photo">{{ trans('cruds.product.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.products.storeMedia') }}" collection-name="product_photo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.product_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.photo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.max_coupons_count') ? 'invalid' : '' }}">
        <label class="form-label required" for="max_coupons_count">{{ trans('cruds.product.fields.max_coupons_count') }}</label>
        <input class="form-control" type="number" name="max_coupons_count" id="max_coupons_count" required wire:model.defer="product.max_coupons_count" step="1">
        <div class="validation-message">
            {{ $errors->first('product.max_coupons_count') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.max_coupons_count_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.max_offers_count') ? 'invalid' : '' }}">
        <label class="form-label required" for="max_offers_count">{{ trans('cruds.product.fields.max_offers_count') }}</label>
        <input class="form-control" type="number" name="max_offers_count" id="max_offers_count" required wire:model.defer="product.max_offers_count" step="1">
        <div class="validation-message">
            {{ $errors->first('product.max_offers_count') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.max_offers_count_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.max_newsletter_count') ? 'invalid' : '' }}">
        <label class="form-label required" for="max_newsletter_count">{{ trans('cruds.product.fields.max_newsletter_count') }}</label>
        <input class="form-control" type="number" name="max_newsletter_count" id="max_newsletter_count" required wire:model.defer="product.max_newsletter_count" step="1">
        <div class="validation-message">
            {{ $errors->first('product.max_newsletter_count') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.max_newsletter_count_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.max_promotions_count') ? 'invalid' : '' }}">
        <label class="form-label required" for="max_promotions_count">{{ trans('cruds.product.fields.max_promotions_count') }}</label>
        <input class="form-control" type="number" name="max_promotions_count" id="max_promotions_count" required wire:model.defer="product.max_promotions_count" step="1">
        <div class="validation-message">
            {{ $errors->first('product.max_promotions_count') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.max_promotions_count_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.max_members_count') ? 'invalid' : '' }}">
        <label class="form-label required" for="max_members_count">{{ trans('cruds.product.fields.max_members_count') }}</label>
        <input class="form-control" type="number" name="max_members_count" id="max_members_count" required wire:model.defer="product.max_members_count" step="1">
        <div class="validation-message">
            {{ $errors->first('product.max_members_count') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.max_members_count_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.max_newsletter_global') ? 'invalid' : '' }}">
        <label class="form-label required" for="max_newsletter_global">{{ trans('cruds.product.fields.max_newsletter_global') }}</label>
        <input class="form-control" type="number" name="max_newsletter_global" id="max_newsletter_global" required wire:model.defer="product.max_newsletter_global" step="1">
        <div class="validation-message">
            {{ $errors->first('product.max_newsletter_global') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.max_newsletter_global_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('product.max_promotions_global') ? 'invalid' : '' }}">
        <label class="form-label required" for="max_promotions_global">{{ trans('cruds.product.fields.max_promotions_global') }}</label>
        <input class="form-control" type="number" name="max_promotions_global" id="max_promotions_global" required wire:model.defer="product.max_promotions_global" step="1">
        <div class="validation-message">
            {{ $errors->first('product.max_promotions_global') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.product.fields.max_promotions_global_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
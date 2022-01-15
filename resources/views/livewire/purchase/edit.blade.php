<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('purchase.activated_at') ? 'invalid' : '' }}">
        <label class="form-label required" for="activated_at">{{ trans('cruds.purchase.fields.activated_at') }}</label>
        <x-date-picker class="form-control" required wire:model="purchase.activated_at" id="activated_at" name="activated_at" />
        <div class="validation-message">
            {{ $errors->first('purchase.activated_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.purchase.fields.activated_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('purchase.deactivated_at') ? 'invalid' : '' }}">
        <label class="form-label" for="deactivated_at">{{ trans('cruds.purchase.fields.deactivated_at') }}</label>
        <x-date-picker class="form-control" wire:model="purchase.deactivated_at" id="deactivated_at" name="deactivated_at" />
        <div class="validation-message">
            {{ $errors->first('purchase.deactivated_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.purchase.fields.deactivated_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('purchase.product_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="product">{{ trans('cruds.purchase.fields.product') }}</label>
        <x-select-list class="form-control" required id="product" name="product" :options="$this->listsForFields['product']" wire:model="purchase.product_id" />
        <div class="validation-message">
            {{ $errors->first('purchase.product_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.purchase.fields.product_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('coupon.code') ? 'invalid' : '' }}">
        <label class="form-label required" for="code">{{ trans('cruds.coupon.fields.code') }}</label>
        <input class="form-control" type="text" name="code" id="code" required wire:model.defer="coupon.code">
        <div class="validation-message">
            {{ $errors->first('coupon.code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.coupon.fields.code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('coupon.expired_at') ? 'invalid' : '' }}">
        <label class="form-label required" for="expired_at">{{ trans('cruds.coupon.fields.expired_at') }}</label>
        <x-date-picker class="form-control" required wire:model="coupon.expired_at" id="expired_at" name="expired_at" />
        <div class="validation-message">
            {{ $errors->first('coupon.expired_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.coupon.fields.expired_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('coupon.redeemed_at') ? 'invalid' : '' }}">
        <label class="form-label" for="redeemed_at">{{ trans('cruds.coupon.fields.redeemed_at') }}</label>
        <x-date-picker class="form-control" wire:model="coupon.redeemed_at" id="redeemed_at" name="redeemed_at" />
        <div class="validation-message">
            {{ $errors->first('coupon.redeemed_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.coupon.fields.redeemed_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('coupon.offer_id') ? 'invalid' : '' }}">
        <label class="form-label" for="offer">{{ trans('cruds.coupon.fields.offer') }}</label>
        <x-select-list class="form-control" id="offer" name="offer" :options="$this->listsForFields['offer']" wire:model="coupon.offer_id" />
        <div class="validation-message">
            {{ $errors->first('coupon.offer_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.coupon.fields.offer_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
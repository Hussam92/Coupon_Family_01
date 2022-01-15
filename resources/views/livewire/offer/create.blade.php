<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('offer.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.offer.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="offer.title">
        <div class="validation-message">
            {{ $errors->first('offer.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.offer.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('offer.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.offer.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="offer.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('offer.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.offer.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('offer.is_active') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="is_active" id="is_active" required wire:model.defer="offer.is_active">
        <label class="form-label inline ml-1 required" for="is_active">{{ trans('cruds.offer.fields.is_active') }}</label>
        <div class="validation-message">
            {{ $errors->first('offer.is_active') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.offer.fields.is_active_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('offer.expired_at') ? 'invalid' : '' }}">
        <label class="form-label" for="expired_at">{{ trans('cruds.offer.fields.expired_at') }}</label>
        <x-date-picker class="form-control" wire:model="offer.expired_at" id="expired_at" name="expired_at" />
        <div class="validation-message">
            {{ $errors->first('offer.expired_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.offer.fields.expired_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('offer.duration_days') ? 'invalid' : '' }}">
        <label class="form-label required" for="duration_days">{{ trans('cruds.offer.fields.duration_days') }}</label>
        <input class="form-control" type="number" name="duration_days" id="duration_days" required wire:model.defer="offer.duration_days" step="1">
        <div class="validation-message">
            {{ $errors->first('offer.duration_days') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.offer.fields.duration_days_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('offer.template_id') ? 'invalid' : '' }}">
        <label class="form-label" for="template">{{ trans('cruds.offer.fields.template') }}</label>
        <x-select-list class="form-control" id="template" name="template" :options="$this->listsForFields['template']" wire:model="offer.template_id" />
        <div class="validation-message">
            {{ $errors->first('offer.template_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.offer.fields.template_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('promotion.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.promotion.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="promotion.title">
        <div class="validation-message">
            {{ $errors->first('promotion.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promotion.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('promotion.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.promotion.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="promotion.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('promotion.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promotion.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('promotion.template_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="template">{{ trans('cruds.promotion.fields.template') }}</label>
        <x-select-list class="form-control" required id="template" name="template" :options="$this->listsForFields['template']" wire:model="promotion.template_id" />
        <div class="validation-message">
            {{ $errors->first('promotion.template_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promotion.fields.template_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('promotion.published_at') ? 'invalid' : '' }}">
        <label class="form-label required" for="published_at">{{ trans('cruds.promotion.fields.published_at') }}</label>
        <x-date-picker class="form-control" required wire:model="promotion.published_at" id="published_at" name="published_at" />
        <div class="validation-message">
            {{ $errors->first('promotion.published_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.promotion.fields.published_at_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('newsletter.template_id') ? 'invalid' : '' }}">
        <label class="form-label" for="template">{{ trans('cruds.newsletter.fields.template') }}</label>
        <x-select-list class="form-control" id="template" name="template" :options="$this->listsForFields['template']" wire:model="newsletter.template_id" />
        <div class="validation-message">
            {{ $errors->first('newsletter.template_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsletter.fields.template_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('newsletter.planned_at') ? 'invalid' : '' }}">
        <label class="form-label" for="planned_at">{{ trans('cruds.newsletter.fields.planned_at') }}</label>
        <x-date-picker class="form-control" wire:model="newsletter.planned_at" id="planned_at" name="planned_at" />
        <div class="validation-message">
            {{ $errors->first('newsletter.planned_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsletter.fields.planned_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('newsletter.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.newsletter.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="newsletter.title">
        <div class="validation-message">
            {{ $errors->first('newsletter.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsletter.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.newsletters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
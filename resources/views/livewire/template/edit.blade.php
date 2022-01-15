<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('template.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.template.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="template.name">
        <div class="validation-message">
            {{ $errors->first('template.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.template.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('template.html') ? 'invalid' : '' }}">
        <label class="form-label required" for="html">{{ trans('cruds.template.fields.html') }}</label>
        <textarea class="form-control" name="html" id="html" required wire:model.defer="template.html" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('template.html') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.template.fields.html_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('template.json') ? 'invalid' : '' }}">
        <label class="form-label required" for="json">{{ trans('cruds.template.fields.json') }}</label>
        <input class="form-control" type="text" name="json" id="json" required wire:model.defer="template.json">
        <div class="validation-message">
            {{ $errors->first('template.json') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.template.fields.json_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.templates.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('teamRole.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.teamRole.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="teamRole.title">
        <div class="validation-message">
            {{ $errors->first('teamRole.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.teamRole.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('permissions') ? 'invalid' : '' }}">
        <label class="form-label" for="permissions">{{ trans('cruds.teamRole.fields.permissions') }}</label>
        <x-select-list class="form-control" id="permissions" name="permissions" wire:model="permissions" :options="$this->listsForFields['permissions']" multiple />
        <div class="validation-message">
            {{ $errors->first('permissions') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.teamRole.fields.permissions_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.team-roles.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
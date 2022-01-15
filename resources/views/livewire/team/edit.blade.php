<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('team.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.team.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="team.name">
        <div class="validation-message">
            {{ $errors->first('team.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.owner_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="owner">{{ trans('cruds.team.fields.owner') }}</label>
        <x-select-list class="form-control" required id="owner" name="owner" :options="$this->listsForFields['owner']" wire:model="team.owner_id" />
        <div class="validation-message">
            {{ $errors->first('team.owner_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.owner_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.code') ? 'invalid' : '' }}">
        <label class="form-label required" for="code">{{ trans('cruds.team.fields.code') }}</label>
        <input class="form-control" type="text" name="code" id="code" required wire:model.defer="team.code">
        <div class="validation-message">
            {{ $errors->first('team.code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.city') ? 'invalid' : '' }}">
        <label class="form-label" for="city">{{ trans('cruds.team.fields.city') }}</label>
        <input class="form-control" type="text" name="city" id="city" wire:model.defer="team.city">
        <div class="validation-message">
            {{ $errors->first('team.city') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.city_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.phone') ? 'invalid' : '' }}">
        <label class="form-label" for="phone">{{ trans('cruds.team.fields.phone') }}</label>
        <input class="form-control" type="text" name="phone" id="phone" wire:model.defer="team.phone">
        <div class="validation-message">
            {{ $errors->first('team.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.domain') ? 'invalid' : '' }}">
        <label class="form-label" for="domain">{{ trans('cruds.team.fields.domain') }}</label>
        <input class="form-control" type="text" name="domain" id="domain" wire:model.defer="team.domain">
        <div class="validation-message">
            {{ $errors->first('team.domain') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.domain_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.team.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" wire:model.defer="team.email">
        <div class="validation-message">
            {{ $errors->first('team.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.street') ? 'invalid' : '' }}">
        <label class="form-label" for="street">{{ trans('cruds.team.fields.street') }}</label>
        <input class="form-control" type="text" name="street" id="street" wire:model.defer="team.street">
        <div class="validation-message">
            {{ $errors->first('team.street') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.street_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.team_banner') ? 'invalid' : '' }}">
        <label class="form-label" for="banner">{{ trans('cruds.team.fields.banner') }}</label>
        <x-dropzone id="banner" name="banner" action="{{ route('admin.teams.storeMedia') }}" collection-name="team_banner" max-file-size="4" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.team_banner') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.banner_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.team_icon') ? 'invalid' : '' }}">
        <label class="form-label" for="icon">{{ trans('cruds.team.fields.icon') }}</label>
        <x-dropzone id="icon" name="icon" action="{{ route('admin.teams.storeMedia') }}" collection-name="team_icon" max-file-size="1" max-width="1024" max-height="1024" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.team_icon') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.icon_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
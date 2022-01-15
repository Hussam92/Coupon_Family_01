<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('subscription.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.subscription.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="subscription.user_id" />
        <div class="validation-message">
            {{ $errors->first('subscription.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('subscription.team_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="team">{{ trans('cruds.subscription.fields.team') }}</label>
        <x-select-list class="form-control" required id="team" name="team" :options="$this->listsForFields['team']" wire:model="subscription.team_id" />
        <div class="validation-message">
            {{ $errors->first('subscription.team_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.team_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
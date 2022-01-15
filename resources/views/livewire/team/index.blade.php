<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('team_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Team" format="csv" />
                <livewire:excel-export model="Team" format="xlsx" />
                <livewire:excel-export model="Team" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.team.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.owner') }}
                            @include('components.table.sort', ['field' => 'owner.name'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.code') }}
                            @include('components.table.sort', ['field' => 'code'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.city') }}
                            @include('components.table.sort', ['field' => 'city'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.phone') }}
                            @include('components.table.sort', ['field' => 'phone'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.domain') }}
                            @include('components.table.sort', ['field' => 'domain'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.street') }}
                            @include('components.table.sort', ['field' => 'street'])
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.banner') }}
                        </th>
                        <th>
                            {{ trans('cruds.team.fields.icon') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teams as $team)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $team->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $team->id }}
                            </td>
                            <td>
                                {{ $team->name }}
                            </td>
                            <td>
                                @if($team->owner)
                                    <span class="badge badge-relationship">{{ $team->owner->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $team->code }}
                            </td>
                            <td>
                                {{ $team->city }}
                            </td>
                            <td>
                                {{ $team->phone }}
                            </td>
                            <td>
                                {{ $team->domain }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $team->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $team->email }}
                                </a>
                            </td>
                            <td>
                                {{ $team->street }}
                            </td>
                            <td>
                                @foreach($team->banner as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($team->icon as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('team_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.teams.show', $team) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('team_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.teams.edit', $team) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('team_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $team->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $teams->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
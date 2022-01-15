<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('offer_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Offer" format="csv" />
                <livewire:excel-export model="Offer" format="xlsx" />
                <livewire:excel-export model="Offer" format="pdf" />
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
                            {{ trans('cruds.offer.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.offer.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.offer.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.offer.fields.is_active') }}
                            @include('components.table.sort', ['field' => 'is_active'])
                        </th>
                        <th>
                            {{ trans('cruds.offer.fields.expired_at') }}
                            @include('components.table.sort', ['field' => 'expired_at'])
                        </th>
                        <th>
                            {{ trans('cruds.offer.fields.duration_days') }}
                            @include('components.table.sort', ['field' => 'duration_days'])
                        </th>
                        <th>
                            {{ trans('cruds.offer.fields.template') }}
                            @include('components.table.sort', ['field' => 'template.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($offers as $offer)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $offer->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $offer->id }}
                            </td>
                            <td>
                                {{ $offer->title }}
                            </td>
                            <td>
                                {{ $offer->description }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $offer->is_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $offer->expired_at }}
                            </td>
                            <td>
                                {{ $offer->duration_days }}
                            </td>
                            <td>
                                @if($offer->template)
                                    <span class="badge badge-relationship">{{ $offer->template->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('offer_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.offers.show', $offer) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('offer_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.offers.edit', $offer) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('offer_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $offer->id }})" wire:loading.attr="disabled">
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
            {{ $offers->links() }}
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
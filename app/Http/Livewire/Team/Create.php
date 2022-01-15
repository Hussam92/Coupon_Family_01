<?php

namespace App\Http\Livewire\Team;

use App\Models\Team;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Team $team;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function mount(Team $team)
    {
        $this->team = $team;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.team.create');
    }

    public function submit()
    {
        $this->validate();

        $this->team->save();
        $this->syncMedia();

        return redirect()->route('admin.teams.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->team->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'team.name' => [
                'string',
                'required',
            ],
            'team.owner_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'team.code' => [
                'string',
                'min:6',
                'max:8',
                'required',
            ],
            'team.city' => [
                'string',
                'nullable',
            ],
            'team.phone' => [
                'string',
                'nullable',
            ],
            'team.domain' => [
                'string',
                'nullable',
            ],
            'team.email' => [
                'email:rfc',
                'nullable',
            ],
            'team.street' => [
                'string',
                'nullable',
            ],
            'mediaCollections.team_banner' => [
                'array',
                'nullable',
            ],
            'mediaCollections.team_banner.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.team_icon' => [
                'array',
                'nullable',
            ],
            'mediaCollections.team_icon.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['owner'] = User::pluck('name', 'id')->toArray();
    }
}

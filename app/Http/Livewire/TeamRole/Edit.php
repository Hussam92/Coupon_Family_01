<?php

namespace App\Http\Livewire\TeamRole;

use App\Models\Permission;
use App\Models\TeamRole;
use Livewire\Component;

class Edit extends Component
{
    public TeamRole $teamRole;

    public array $permissions = [];

    public array $listsForFields = [];

    public function mount(TeamRole $teamRole)
    {
        $this->teamRole    = $teamRole;
        $this->permissions = $this->teamRole->permissions()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.team-role.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->teamRole->save();
        $this->teamRole->permissions()->sync($this->permissions);

        return redirect()->route('admin.team-roles.index');
    }

    protected function rules(): array
    {
        return [
            'teamRole.title' => [
                'string',
                'required',
            ],
            'permissions' => [
                'array',
            ],
            'permissions.*.id' => [
                'integer',
                'exists:permissions,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['permissions'] = Permission::pluck('title', 'id')->toArray();
    }
}

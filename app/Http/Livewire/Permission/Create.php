<?php

namespace App\Http\Livewire\Permission;

use App\Models\Permission;
use Livewire\Component;

class Create extends Component
{
    public Permission $permission;

    public function mount(Permission $permission)
    {
        $this->permission            = $permission;
        $this->permission->is_public = true;
    }

    public function render()
    {
        return view('livewire.permission.create');
    }

    public function submit()
    {
        $this->validate();

        $this->permission->save();

        return redirect()->route('admin.permissions.index');
    }

    protected function rules(): array
    {
        return [
            'permission.title' => [
                'string',
                'required',
            ],
            'permission.is_public' => [
                'boolean',
            ],
        ];
    }
}

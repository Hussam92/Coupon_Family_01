<?php

namespace App\Http\Livewire\Subscription;

use App\Models\Subscription;
use App\Models\Team;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public Subscription $subscription;

    public function mount(Subscription $subscription)
    {
        $this->subscription = $subscription;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.subscription.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->subscription->save();

        return redirect()->route('admin.subscriptions.index');
    }

    protected function rules(): array
    {
        return [
            'subscription.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'subscription.team_id' => [
                'integer',
                'exists:teams,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('email', 'id')->toArray();
        $this->listsForFields['team'] = Team::pluck('name', 'id')->toArray();
    }
}

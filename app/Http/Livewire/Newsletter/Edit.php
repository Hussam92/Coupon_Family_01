<?php

namespace App\Http\Livewire\Newsletter;

use App\Models\Newsletter;
use App\Models\Template;
use Livewire\Component;

class Edit extends Component
{
    public Newsletter $newsletter;

    public array $listsForFields = [];

    public function mount(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.newsletter.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->newsletter->save();

        return redirect()->route('admin.newsletters.index');
    }

    protected function rules(): array
    {
        return [
            'newsletter.template_id' => [
                'integer',
                'exists:templates,id',
                'nullable',
            ],
            'newsletter.planned_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'newsletter.title' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['template'] = Template::pluck('name', 'id')->toArray();
    }
}

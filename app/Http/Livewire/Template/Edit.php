<?php

namespace App\Http\Livewire\Template;

use App\Models\Template;
use Livewire\Component;

class Edit extends Component
{
    public Template $template;

    public function mount(Template $template)
    {
        $this->template = $template;
    }

    public function render()
    {
        return view('livewire.template.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->template->save();

        return redirect()->route('admin.templates.index');
    }

    protected function rules(): array
    {
        return [
            'template.name' => [
                'string',
                'required',
            ],
            'template.html' => [
                'string',
                'required',
            ],
            'template.json' => [
                'string',
                'required',
            ],
        ];
    }
}

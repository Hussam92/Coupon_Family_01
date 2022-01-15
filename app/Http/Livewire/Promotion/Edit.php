<?php

namespace App\Http\Livewire\Promotion;

use App\Models\Promotion;
use App\Models\Template;
use Livewire\Component;

class Edit extends Component
{
    public Promotion $promotion;

    public array $listsForFields = [];

    public function mount(Promotion $promotion)
    {
        $this->promotion = $promotion;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.promotion.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->promotion->save();

        return redirect()->route('admin.promotions.index');
    }

    protected function rules(): array
    {
        return [
            'promotion.title' => [
                'string',
                'required',
            ],
            'promotion.description' => [
                'string',
                'nullable',
            ],
            'promotion.template_id' => [
                'integer',
                'exists:templates,id',
                'required',
            ],
            'promotion.published_at' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['template'] = Template::pluck('name', 'id')->toArray();
    }
}

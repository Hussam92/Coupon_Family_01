<?php

namespace App\Http\Livewire\Offer;

use App\Models\Offer;
use App\Models\Template;
use Livewire\Component;

class Create extends Component
{
    public Offer $offer;

    public array $listsForFields = [];

    public function mount(Offer $offer)
    {
        $this->offer            = $offer;
        $this->offer->is_active = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.offer.create');
    }

    public function submit()
    {
        $this->validate();

        $this->offer->save();

        return redirect()->route('admin.offers.index');
    }

    protected function rules(): array
    {
        return [
            'offer.title' => [
                'string',
                'required',
            ],
            'offer.description' => [
                'string',
                'nullable',
            ],
            'offer.is_active' => [
                'boolean',
            ],
            'offer.expired_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'offer.duration_days' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'offer.template_id' => [
                'integer',
                'exists:templates,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['template'] = Template::pluck('name', 'id')->toArray();
    }
}

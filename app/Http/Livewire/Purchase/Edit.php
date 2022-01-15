<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Product;
use App\Models\Purchase;
use Livewire\Component;

class Edit extends Component
{
    public Purchase $purchase;

    public array $listsForFields = [];

    public function mount(Purchase $purchase)
    {
        $this->purchase = $purchase;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.purchase.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->purchase->save();

        return redirect()->route('admin.purchases.index');
    }

    protected function rules(): array
    {
        return [
            'purchase.activated_at' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'purchase.deactivated_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'purchase.product_id' => [
                'integer',
                'exists:products,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['product'] = Product::pluck('name', 'id')->toArray();
    }
}

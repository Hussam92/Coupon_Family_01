<?php

namespace App\Http\Livewire\Coupon;

use App\Models\Coupon;
use App\Models\Offer;
use Livewire\Component;

class Edit extends Component
{
    public Coupon $coupon;

    public array $listsForFields = [];

    public function mount(Coupon $coupon)
    {
        $this->coupon = $coupon;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.coupon.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->coupon->save();

        return redirect()->route('admin.coupons.index');
    }

    protected function rules(): array
    {
        return [
            'coupon.code' => [
                'string',
                'min:8',
                'max:8',
                'required',
            ],
            'coupon.expired_at' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'coupon.redeemed_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'coupon.offer_id' => [
                'integer',
                'exists:offers,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['offer'] = Offer::pluck('title', 'id')->toArray();
    }
}

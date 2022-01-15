<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Product $product;

    public array $mediaToRemove = [];

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

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product.create');
    }

    public function submit()
    {
        $this->validate();

        $this->product->save();
        $this->syncMedia();

        return redirect()->route('admin.products.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->product->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'product.name' => [
                'string',
                'required',
            ],
            'product.description' => [
                'string',
                'nullable',
            ],
            'product.price' => [
                'numeric',
                'required',
            ],
            'mediaCollections.product_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.product_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'product.max_coupons_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'product.max_offers_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'product.max_newsletter_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'product.max_promotions_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'product.max_members_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'product.max_newsletter_global' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'product.max_promotions_global' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Livewire\Purchase;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Purchase;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Purchase())->orderable;
    }

    public function render()
    {
        $query = Purchase::with(['product', 'team'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $purchases = $query->paginate($this->perPage);

        return view('livewire.purchase.index', compact('purchases', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Purchase::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase->delete();
    }
}

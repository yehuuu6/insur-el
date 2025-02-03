<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\On;
use Masmerise\Toaster\Toaster;

class AboutToExpireTable extends Component
{
    use WithPagination;

    public $sortBy = "asc";
    public $perPage;

    public function placeholder()
    {
        return view('components.table-placeholder');
    }

    public function updateValue(string $customerId, string $type, string $value)
    {
        $customer = Customer::find($customerId);
        $customer->$type = $value;
        $customer->save();

        Toaster::success('Müşteri bilgisi güncellendi.');
    }

    public function deleteCustomer(string $customerId)
    {
        Customer::find($customerId)->delete();
        Toaster::success('Müşteri başarıyla silindi.');
    }
    public function mount()
    {
        $this->perPage = session('perPage', 25);
    }

    #[On('update-per-page')]
    public function updatedPerPage($value)
    {
        session(['perPage' => $value]);
    }

    #[Computed]
    public function customers()
    {
        // Return customers who are about to expire in the next 15 days
        return Customer::where('expiry_date', '>=', now())
            ->where('expiry_date', '<=', now()->addDays(15))
            ->orderBy('expiry_date', $this->sortBy)
            ->simplePaginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.customer.about-to-expire-table');
    }
}

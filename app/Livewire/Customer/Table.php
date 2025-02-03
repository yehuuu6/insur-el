<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use App\Exports\CustomersExport;
use App\Imports\CustomersImport;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Renderless;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\ValidationException;

class Table extends Component
{
    use WithPagination, WithFileUploads;

    public $customersFile = null;
    public $sortBy = "desc";
    public $perPage;

    public function mount()
    {
        $this->perPage = session('perPage', 25);
    }

    public function placeholder()
    {
        return view('components.table-placeholder');
    }

    #[On('update-per-page')]
    public function updatedPerPage($value)
    {
        session(['perPage' => $value]);
    }

    #[Renderless]
    #[On('cancel-upload')]
    public function cancelUpload()
    {
        $this->reset('customersFile');
    }

    public function deleteAllCustomers()
    {
        Customer::truncate();
        Toaster::success('Bütün müşteriler başarıyla silindi.');
    }

    public function importCustomers()
    {
        $messages = [
            'customersFile.required' => 'Müşteri dosyası gereklidir.',
            'customersFile.file' => 'Müşteri dosyası bir dosya olmalıdır.',
            'customersFile.mimes' => 'Müşteri dosyası sadece xlsx ve xls formatında olabilir.',
        ];
        try {
            $this->validate([
                'customersFile' => 'required|file',
            ], $messages);
        } catch (ValidationException $e) {
            Toaster::error('You uploaded file type is: ' . $this->customersFile->getMimeType());
            return;
        }
        $filePath = $this->customersFile->store(path: 'customers');
        try {
            Excel::import(new CustomersImport, $filePath);
        } catch (\Exception $e) {
            Toaster::error('Müşteriler yüklenirken bir hata oluştu. Lütfen dosyanızı kontrol edin.');
            return;
        }
        $this->dispatch('cancel-upload');
        $this->dispatch('close-excel-modal');
        unset($this->customers);
        Toaster::success('Müşteriler başarıyla yüklendi.');
    }

    public function exportCustomers()
    {
        return Excel::download(new CustomersExport, 'musteriler.xlsx');
    }

    public function deleteCustomer(string $customerId)
    {
        Customer::find($customerId)->delete();
        Toaster::success('Müşteri başarıyla silindi.');
    }

    public function updateValue(string $customerId, string $type, string $value)
    {
        $customer = Customer::find($customerId);
        $customer->$type = $value;
        $customer->save();

        Toaster::success('Müşteri bilgisi güncellendi.');
    }

    #[Computed]
    public function customers()
    {
        return Customer::orderBy('issue_date', $this->sortBy)
            ->simplePaginate((int) $this->perPage);
    }

    public function render()
    {
        return view('livewire.customer.table');
    }
}

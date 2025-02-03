<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
use Masmerise\Toaster\Toaster;

class CreateCustomer extends Component
{
    public $name;
    public $tc;
    public $birth_date;
    public $plate;
    public $document_serial;
    public $issue_date;
    public $expiry_date;
    public $start_date;
    public $policy_type;
    public $policy_no;
    public $company;

    public function cleanForm()
    {
        $this->reset();
    }

    public function createCustomer()
    {
        $nonValidated = [
            'name' => $this->name,
            'tc' => $this->tc,
            'birth_date' => $this->birth_date,
            'plate' => $this->plate,
            'document_serial' => $this->document_serial,
            'issue_date' => $this->issue_date,
            'expiry_date' => $this->expiry_date,
            'start_date' => $this->start_date,
            'policy_type' => $this->policy_type,
            'policy_no' => $this->policy_no,
            'company' => $this->company,
        ];

        $customer = Customer::create($nonValidated);

        return Redirect::route('dashboard')->success('Müşteri başarıyla oluşturuldu.');
    }

    public function render()
    {
        return view('livewire.customer.create-customer');
    }
}

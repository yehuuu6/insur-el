<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::select('tc', 'birth_date', 'name', 'plate', 'document_serial', 'issue_date', 'start_date', 'expiry_date', 'policy_type', 'policy_no', 'company', 'phone', 'notes')->get();
    }

    public function headings(): array
    {
        return [
            'tc_vergi_no',
            'dogum',
            'musteri',
            'plaka',
            'belge_seri',
            'tanzim',
            'baslangic',
            'bitis',
            'police',
            'police_no',
            'sirket',
            'telefon',
            'notlar'
        ];
    }
}

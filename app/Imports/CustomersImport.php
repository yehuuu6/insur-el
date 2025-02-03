<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row); // Uncomment this line to debug the row data
        return new Customer([
            'tc' => $row['tc_vergi_no'], // Use the header name as the key
            'name' => $row['musteri'],
            'plate' => $row['plaka'],
            'document_serial' => $row['belge_seri'],
            'issue_date' => $row['tanzim'],
            'start_date' => $row['baslangic'],
            'expiry_date' => $row['bitis'],
            'policy_type' => $row['police'],
            'policy_no' => $row['police_no'],
            'company' => $row['sirket'],
        ]);
    }
}

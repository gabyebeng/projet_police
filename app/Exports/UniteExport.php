<?php

namespace App\Exports;

use App\Models\Unite;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UniteExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Unite::select('nom', 'equipe_id')->get();
    }
    public function headings(): array
    {
        return [
            'nom',
            'equipe_id'
        ];
    }
}

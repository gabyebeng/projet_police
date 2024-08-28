<?php

namespace App\Exports;

use App\Models\Control;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ControlAbsentExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Control::select('MATRICULE', 'NOM', 'GRADE', 'UNITE_ID', 'UNITE_CTRL', 'DATECTRL')->where("statut", "=", "PAS OK")->get();
    }
    public function headings(): array
    {
        return [
            'matricule',
            'nom',
            'grade',
            'unite_id',
            'unite_Ctrl',
            'dateCtrl'
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Control;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ControlExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Control::select('matricule', 'nom', 'grade', 'unite_id', 'unite_Ctrl', 'dateCtrl')->where("statut", "=", "OK")->get();
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

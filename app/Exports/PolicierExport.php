<?php

namespace App\Exports;

use App\Models\Policier;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PolicierExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Policier::select('matricule', 'nom', 'postnom', 'prenom', 'sexe', 'grade', 'unite_id')->get();
    }
    public function headings(): array
    {
        return [
            'matricule',
            'nom',
            'postnom',
            'prenom',
            'sexe',
            'grade',
            'unite_id'
        ];
    }
}

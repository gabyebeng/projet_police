<?php

namespace App\Imports;

use App\Models\Policier;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PoliciersImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $policier = Policier::where('matricule', $row['matricule'])->first();
            if ($policier) {
                $policier->update([
                    'nom' => $row['nom'],
                    'postnom' => $row['postnom'],
                    'prenom' => $row['prenom'],
                    'sexe' => $row['sexe'],
                    'grade' => $row['grade'],
                    'unite_id' => $row['unite_id'],
                ]);
            } else {
                Policier::create([
                    'matricule' => $row['matricule'],
                    'nom' => $row['nom'],
                    'postnom' => $row['postnom'],
                    'prenom' => $row['prenom'],
                    'sexe' => $row['sexe'],
                    'grade' => $row['grade'],
                    'unite_id' => $row['unite_id'],
                ]);
            }

        }
    }
}

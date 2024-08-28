<?php

namespace App\Imports;

use App\Models\Unite;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UniteImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $unite = Unite::where('nom', $row['nom'])->first();
            if ($unite) {
                $unite->update([

                ]);
            } else {
                Unite::create([
                    'nom' => $row['nom'],

                ]);
            }


        }
    }
}

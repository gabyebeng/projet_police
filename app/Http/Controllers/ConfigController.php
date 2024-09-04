<?php

namespace App\Http\Controllers;

use App\Exports\ControlAbsentExport;
use App\Exports\ControlExport;
use App\Exports\PolicierExport;
use App\Exports\UniteExport;
use App\Exports\UniteExportFile;
use App\Imports\ChargeUniteImport;
use App\Imports\PoliciersImport;
use App\Imports\UniteImport;
use App\Models\Control;
use App\Models\Servcontrol;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ConfigController extends Controller
{
    public function synchronisation()
    {
        $control = Control::where('statut', 'OK')->get();
        foreach ($control as $row) {
            $servcontrol = Servcontrol::where('matricule', $row['matricule'])->first();
            if ($servcontrol) {
                $servcontrol->update([
                    'statut' => $row['statut'],
                ]);
            } else {
                Servcontrol::create([
                    'matricule' => $row['matricule'],
                    'nom' => $row['nom'],
                    'grade' => $row['grade'],
                    'statut' => $row['statut'],
                    'unite_id' => $row['unite_id'],
                    'equipe_id' => $row['equipe_id'],
                ]);
            }

        }
        return redirect()->back();
    }
    public function index()
    {
        return view("configurations.index");
    }

    public function exportUnite()
    {
        return Excel::download(new UniteExportFile, "Unite-Config.xlsx");
    }
    public function chargeUniteImport(Request $request)
    {
        Excel::import(new ChargeUniteImport, $request->file("excel_file"));
        return redirect()->back()->with("message", "Importation ok");
    }
    public function importerUnite(Request $request)
    {
        Excel::import(new UniteImport, $request->file("excel_file"));
        return redirect()->back()->with("message", "Importation ok");
    }

    public function importerPolicier(Request $request)
    {
        Excel::import(new PoliciersImport, $request->file("excel_file"));
        return redirect()->back()->with("message", "Importation ok");
    }
    public function exportAbsent()
    {
        return Excel::download(new ControlAbsentExport, "Absents_A_Unite.xlsx");
    }
    public function exportControl()
    {
        return Excel::download(new ControlExport, "Presents_A_Unite.xlsx");
    }
    public function exportPolicier()
    {
        return Excel::download(new PolicierExport, "Policier-Config.xlsx");
    }
}

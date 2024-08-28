<?php

namespace App\Http\Controllers;

use App\Exports\ControlAbsentExport;
use App\Exports\ControlExport;
use App\Exports\PolicierExport;
use App\Exports\UniteExport;
use App\Imports\ChargeUniteImport;
use App\Imports\PoliciersImport;
use App\Imports\UniteImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ConfigController extends Controller
{
    public function index()
    {
        return view("configurations.index");
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
    public function exportUnite()
    {
        // return Excel::download(new PolicierExport, "Policier-Config.xlsx");
        return Excel::download(new UniteExport, "Unite-Config.xlsx");
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
}

<?php

namespace App\Http\Controllers;

use App\Imports\PoliciersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ConfigController extends Controller
{
    public function index()
    {
        return view("configurations.index");
    }
    public function importer(Request $request)
    {
        Excel::import(new PoliciersImport, $request->file("excel_file"));
        return redirect()->back()->with("message", "Importation ok");
    }
}

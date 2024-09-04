<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Equipe;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function index()
    {
        $equipe_1 = Equipe::with('user')->where("id", 1);
        $totEq_1 = Control::where("id", 1)->count();
        return view("statistiques.index", compact("totEq_1"));
    }
    public function statProvince()
    {
        $Equateur = Control::where("province", 'Equateur')->count();
        $SudUbangui = Control::where("province", 'Equateur')->count();
        $NordUbangui = Control::where("province", 'Nord-Ubangui')->count();
        $Mongala = Control::where("province", 'Mongale')->count();
        $BasUele = Control::where("province", 'Bas-Uele')->count();
        $HautUele = Control::where("province", 'Haut-Uele')->count();
        $Kasaï = Control::where("province", 'Kasaï')->count();
        $SudKivu = Control::where("province", 'Sud-Kivu')->count();
        $Lualaba = Control::where("province", 'Lualaba')->count();
        $Tshopo = Control::where("province", 'Tshopo')->count();
        $Ituri = Control::where("province", 'Ituri')->count();
        $KongoCentral = Control::where("province", 'Kongo-Central')->count();
        $Kinshasa = Control::where("province", 'Kinshasa')->count();
        $Lomani = Control::where("province", 'Lomani')->count();
        $NordKivu = Control::where("province", 'Nord-Kivu')->count();
        $HautKatanga = Control::where("province", 'HautKatanga')->count();
        $Maniema = Control::where("province", 'Maniema')->count();
        $Tshuapa = Control::where("province", 'Tshuapa')->count();
        $Kwango = Control::where("province", 'Kwango')->count();
        $Kwilu = Control::where("province", 'Kwilu')->count();
        $MaiNdombe = Control::where("province", 'Mai-Ndombe')->count();
        $HautLomani = Control::where("province", 'Haut-Lomani')->count();
        $Tanganyika = Control::where("province", 'Tanganyika')->count();
        $Sankuru = Control::where("province", 'Sankuru')->count();
        $KasaïOriental = Control::where("province", 'Kasaï-Oriental')->count();
        $KasaïCentral = Control::where("province", 'Kasaï-Central')->count();


        // return view("statistiques.province");
        return view("statistiques.province", compact(
            'Equateur',
            'NordUbangui',
            'SudUbangui',
            'SudKivu',
            'Mongala',
            'BasUele',
            'HautUele',
            'Kasaï',
            'Lualaba',
            'Tshopo',
            'Ituri',
            'KongoCentral',
            'Kinshasa',
            'Lomani',
            'NordKivu',
            'HautKatanga',
            'Maniema',
            'Tshuapa',
            'Kwango',
            'Kwilu',
            'MaiNdombe',
            'HautLomani',
            'Tanganyika',
            'Sankuru',
            'KasaïOriental',
            'KasaïCentral'
        ));
    }
}

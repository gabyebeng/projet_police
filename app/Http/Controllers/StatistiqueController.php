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
        $Equateur = Control::where("province", 'Equateur')->where('statut', 'OK')->count();
        $SudUbangui = Control::where("province", 'Equateur')->where('statut', 'OK')->count();
        $NordUbangui = Control::where("province", 'Nord-Ubangi')->where('statut', 'OK')->count();
        $Mongala = Control::where("province", 'Mongale')->where('statut', 'OK')->count();
        $BasUele = Control::where("province", 'Bas Uele')->where('statut', 'OK')->count();
        $HautUele = Control::where("province", 'Haut-Uele')->where('statut', 'OK')->count();
        $Kasaï = Control::where("province", 'Kasaï')->where('statut', 'OK')->count();
        $SudKivu = Control::where("province", 'Sud-Kivu')->where('statut', 'OK')->count();
        $Lualaba = Control::where("province", 'Lualaba')->where('statut', 'OK')->count();
        $Tshopo = Control::where("province", 'Tshopo')->where('statut', 'OK')->count();
        $Ituri = Control::where("province", 'Ituri')->where('statut', 'OK')->count();
        $KongoCentral = Control::where("province", 'Kongo Central')->where('statut', 'OK')->count();
        $Kinshasa = Control::where("province", 'Kinshasa')->where('statut', 'OK')->count();
        $Lomami = Control::where("province", 'Lomami')->where('statut', 'OK')->count();
        $NordKivu = Control::where("province", 'Nord-Kivu')->where('statut', 'OK')->count();
        $HautKatanga = Control::where("province", 'Haut-Katanga')->where('statut', 'OK')->count();
        $Maniema = Control::where("province", 'Maniema')->where('statut', 'OK')->count();
        $Tshuapa = Control::where("province", 'Tshuapa')->where('statut', 'OK')->count();
        $Kwango = Control::where("province", 'Kwango')->where('statut', 'OK')->count();
        $Kwilu = Control::where("province", 'Kwilu')->where('statut', 'OK')->count();
        $MaiNdombe = Control::where("province", 'Mai-Ndombe')->where('statut', 'OK')->count();
        $HautLomami = Control::where("province", 'Haut-Lomami')->where('statut', 'OK')->count();
        $Tanganyika = Control::where("province", 'Tanganyika')->where('statut', 'OK')->count();
        $Sankuru = Control::where("province", 'Sankuru')->where('statut', 'OK')->count();
        $KasaïOriental = Control::where("province", 'Kasaï-Oriental')->where('statut', 'OK')->count();
        $KasaïCentral = Control::where("province", 'Kasaï-Central')->where('statut', 'OK')->count();

        $EquateurAbs = Control::where("province", 'Equateur')->where('statut', 'PAS OK')->count();
        $SudUbanguiAbs = Control::where("province", 'Equateur')->where('statut', 'PAS OK')->count();
        $NordUbanguiAbs = Control::where("province", 'Nord-Ubangi')->where('statut', 'PAS OK')->count();
        $MongalaAbs = Control::where("province", 'Mongale')->where('statut', 'PAS OK')->count();
        $BasUeleAbs = Control::where("province", 'Bas Uele')->where('statut', 'PAS OK')->count();
        $HautUeleAbs = Control::where("province", 'Haut-Uele')->where('statut', 'PAS OK')->count();
        $KasaïAbs = Control::where("province", 'Kasaï')->where('statut', 'PAS OK')->count();
        $SudKivuAbs = Control::where("province", 'Sud-Kivu')->where('statut', 'PAS OK')->count();
        $LualabaAbs = Control::where("province", 'Lualaba')->where('statut', 'PAS OK')->count();
        $TshopoAbs = Control::where("province", 'Tshopo')->where('statut', 'PAS OK')->count();
        $IturiAbs = Control::where("province", 'Ituri')->where('statut', 'PAS OK')->count();
        $KongoCentralAbs = Control::where("province", 'Kongo Central')->where('statut', 'PAS OK')->count();
        $KinshasaAbs = Control::where("province", 'Kinshasa')->where('statut', 'PAS OK')->count();
        $LomamiAbs = Control::where("province", 'Lomami')->where('statut', 'OK')->count();
        $NordKivuAbs = Control::where("province", 'Nord-Kivu')->where('statut', 'PAS OK')->count();
        $HautKatangaAbs = Control::where("province", 'Haut-Katanga')->where('statut', 'PAS OK')->count();
        $ManiemaAbs = Control::where("province", 'Maniema')->where('statut', 'PAS OK')->count();
        $TshuapaAbs = Control::where("province", 'Tshuapa')->where('statut', 'PAS OK')->count();
        $KwangoAbs = Control::where("province", 'Kwango')->where('statut', 'PAS OK')->count();
        $KwiluAbs = Control::where("province", 'Kwilu')->where('statut', 'PAS OK')->count();
        $MaiNdombeAbs = Control::where("province", 'Mai-Ndombe')->where('statut', 'PAS OK')->count();
        $HautLomamiAbs = Control::where("province", 'Haut-Lomami')->where('statut', 'PAS OK')->count();
        $TanganyikaAbs = Control::where("province", 'Tanganyika')->where('statut', 'PAS OK')->count();
        $SankuruAbs = Control::where("province", 'Sankuru')->where('statut', 'PAS OK')->count();
        $KasaïOrientalAbs = Control::where("province", 'Kasaï-Oriental')->where('statut', 'PAS OK')->count();
        $KasaïCentralAbs = Control::where("province", 'Kasaï-Central')->where('statut', 'PAS OK')->count();


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
            'Lomami',
            'NordKivu',
            'HautKatanga',
            'Maniema',
            'Tshuapa',
            'Kwango',
            'Kwilu',
            'MaiNdombe',
            'HautLomami',
            'Tanganyika',
            'Sankuru',
            'KasaïOriental',
            'KasaïCentral',

            'EquateurAbs',
            'NordUbanguiAbs',
            'SudUbanguiAbs',
            'SudKivuAbs',
            'MongalaAbs',
            'BasUeleAbs',
            'HautUeleAbs',
            'KasaïAbs',
            'LualabaAbs',
            'TshopoAbs',
            'IturiAbs',
            'KongoCentralAbs',
            'KinshasaAbs',
            'LomamiAbs',
            'NordKivuAbs',
            'HautKatangaAbs',
            'ManiemaAbs',
            'TshuapaAbs',
            'KwangoAbs',
            'KwiluAbs',
            'MaiNdombeAbs',
            'HautLomamiAbs',
            'TanganyikaAbs',
            'SankuruAbs',
            'KasaïOrientalAbs',
            'KasaïCentralAbs'
        ));
    }
}

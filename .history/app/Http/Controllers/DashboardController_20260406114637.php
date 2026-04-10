<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $data = array(
            "title"                 => "Dashboard",
            "menuDashboard"         => "active",
            "jumlahSuratMasuk"      => SuratMasuk::count(),
            "jumlahSuratKeluar"     => SuratKeluar::count(),
        );
        return view ('dashboard', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Footer;
use App\Models\Hero;

class HomeController extends Controller

{
    public function index()

    {

        // Mengambil semua data dari tabel collections
        $collection = Collection::all();

        // Mengambil semua data dari tabel footers
        $footer = Footer::all();

        $hero = Hero::all();

        // Kirim data ke view
        return view('landingpage.index', compact('collection', 'footer', 'hero'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homepage()
    {
        $auth = [
            'name' => 'Thomas',
            'email' => 'thomas@example.com'
        ];

        return view('home', compact('auth'));
    }

    

    public function aboutUs()
    {
        $title = 'Chi siamo';

        $descrizione = 'Questa è una breve descrizione su chi siamo';

        return view('chi_siamo', compact('descrizione', 'title'));
    }
}

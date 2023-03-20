<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Piatto;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function count() 
    {
        $title = 'Totale Piatti - Ingredienti';
        
        $count_ingredienti = Ingrediente::count();
        $count_piatti = Piatto::count();

        return view('dashboard', compact('title', 'count_ingredienti', 'count_piatti'));

    }
}
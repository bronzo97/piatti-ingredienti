<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Piatto;
use Illuminate\Http\Request;

class CountController extends Controller
{
    public function index(Request $request)
    {
        // COUNT
        $count_piatti = Piatto::count();
        $count_ingredienti = Ingrediente::count();
        $title = 'Dashboard';
        $search = '';

        // SEARCH
        
        if (!$request->search) {
            
            $search_ingredienti = '';
            $search_piatti = '';
            
            return view('dashboard', compact('search', 'search_ingredienti', 'search_piatti', 'title', 'count_ingredienti', 'count_piatti'));
        } else {
            $search = $request->search;

            $search_ingredienti = '';
            $search_piatti = '';

            $search_ingredienti = Ingrediente::where('nome_ingrediente', "LIKE", '%' . $search. '%')->get();
            $search_piatti = Piatto::where('nome_piatto', "LIKE", '%' . $search. '%')->get();

            //dd($search_piatti, $search_ingredienti);
            
            return view('dashboard', compact('search', 'search_ingredienti', 'search_piatti', 'title', 'count_ingredienti', 'count_piatti'));
        }
        
    }

    
}
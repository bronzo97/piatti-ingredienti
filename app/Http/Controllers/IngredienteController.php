<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;
use App\Services\PayUService\Exception;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->search){
            $title = 'Lista Ingredienti';

            $lista_ingredienti = Ingrediente::orderBy('nome_ingrediente')->get();
            $search_ingredienti = '';
            //dd($lista_ingredienti);
            return view('listaingredienti', compact('title','lista_ingredienti', 'search_ingredienti'));
        } else {
            $title = 'Lista Ingredienti';
            
            $search_ingredienti = $request->search;
            //dd($search_piatti);
            $lista_ingredienti = Ingrediente::where('nome_ingrediente', "LIKE", '%' . $search_ingredienti. '%')->get();
            //dd($lista_piatti);
            
            return view('listaingredienti', compact('title', 'lista_ingredienti', 'search_ingredienti'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {   
            $ingrediente = new Ingrediente;
            $ingrediente->codice_ingrediente = 0;
            $ingrediente->costo = "";

        $title = "Inserisci un nuovo ingrediente";

        return view('crea_modifica_ingrediente', compact( 'title', 'ingrediente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->codice_ingrediente > 0) {

            $ingrediente = Ingrediente::find($request->codice_ingrediente);
            $ingrediente->nome_ingrediente = $request->nome_ingrediente;
            $ingrediente->costo = $request->costo;
            $ingrediente->tipologia = $request->tipologia;

            
            $ingrediente->update();

        } else {
            $this->validate($request, 
            [
                'nome_ingrediente' => 'required|unique:ingredienti,nome_ingrediente',
                'costo' => 'required',
                'tipologia' => 'not_in:0',
            ],
            [
                'nome_ingrediente.required' => 'Inserisci un nome',
                'nome_ingrediente.unique' => 'Il nome inserito è già esistente',
                'costo.required' => 'Inserisci un prezzo',
                'tipologia.not_in' => 'Inserisci una tipologia',
            ]);

            $ingrediente = new Ingrediente;
            $ingrediente->nome_ingrediente = $request->nome_ingrediente;
            $ingrediente->costo = $request->costo;
            $ingrediente->tipologia = $request->tipologia;

            $ingrediente->save();
        }

        return redirect('listaingredienti');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function show($codice_ingrediente)
    {
        $title = 'Dettagli ingrediente';

        $ingrediente = Ingrediente::where('codice_ingrediente', '=', $codice_ingrediente)->first();
        //dd($ingrediente);
        return view('dettagliingrediente', compact('title', 'ingrediente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */


    public function edit($codice_ingrediente)
    {
        $title = "Modifica l'ingrediente";
        $ingrediente = Ingrediente::find($codice_ingrediente);

        return view('crea_modifica_ingrediente', compact('title', 'ingrediente'));
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */

    /////////////// NOT NECESSARY /////////////
    /*
    public function update(Request $request, Ingrediente $ingrediente)
    {
        //
    }
    */
    ///////////////////////////////////////////

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice_ingrediente)
    {
        $ingrediente = Ingrediente::find($codice_ingrediente);

        try {

            $ingrediente->delete();
            
            return redirect('listaingredienti');
        
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() == 23000) {
            //dd($e->getCode() == 23000);
            return back()->with('error', 'Non è possibile cancellare l\'ingrediente perchè associato a un piatto');
            }
        }
    
        
    }
}

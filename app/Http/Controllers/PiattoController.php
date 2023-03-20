<?php

namespace App\Http\Controllers;

use App\Models\Piatto;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class PiattoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->search){
            $title = 'Lista Piatti';

            $lista_piatti = Piatto::orderBy('nome_piatto')->get();
            $search_piatti = '';
            //dd($lista_piatti);
            return view('listapiatti', compact('title','lista_piatti', 'search_piatti'));
        } else {
            $title = 'Lista Piatti';
            
            $search_piatti = $request->search;
            //dd($search_piatti);
            $lista_piatti = Piatto::where('nome_piatto', "LIKE", '%' . $search_piatti. '%')->get();
            //dd($lista_piatti);
            
            return view('listapiatti', compact('title', 'lista_piatti', 'search_piatti'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Inserisci un nuovo piatto';
        $piatti = Piatto::all();
        //dd($piatti);

        return view('aggiungi_piatto', compact('title', 'piatti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $title = 'Inserisci un nuovo piatto';



        $this->validate($request, 
                                [
                                    'nome_piatto' => 'required|unique:piatti,nome_piatto',
                                    'regione' => 'required'
                                ],
                                [
                                    'nome_piatto.required' => 'Inserisci un nome',
                                    'nome_piatto.unique' => 'Il nome inserito è già esistente',
                                    'regione.required' => 'Inserisci una regione'
                                ]);

        $piatti = new Piatto;
        $piatti->nome_piatto = $request->nome_piatto;
        $piatti->regione = $request->regione;
        $piatti->save();
                                /*
        $lista_piatti = Piatto::all();
        $search_piatti = '';
        */
        return redirect('listapiatti');
        /*
        return view('listapiatti', compact('title', 'piatti', 'lista_piatti', 'search_piatti'));
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piatto  $piatto
     * @return \Illuminate\Http\Response
     */
    public function show($codice_piatto)
    {
        $title = 'Dettagli piatto';

        $piatto = Piatto::where('codice_piatto', '=', $codice_piatto)->first();
        //dd($piatto);

        $totale = $piatto->ingredienti->sum('costo');


        return view('dettaglipiatto', compact('title', 'piatto', 'totale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piatto  $piatto
     * @return \Illuminate\Http\Response
     */
    public function edit($codice_piatto)
    {
        $title = 'Modifica piatto';

        $piatto = Piatto::where('codice_piatto', '=', $codice_piatto)->first();
        //dd($piatto->ingredienti);
        $ingredienti = Ingrediente::all();
        

        return view('modificapiatto', compact('title', 'piatto', 'ingredienti'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piatto  $piatto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codice_piatto)
    {
        $title = 'Modifica piatto';
        
        $this->validate($request, 
        [
            'nome_piatto' => 'required',
            'regione' => 'required'
        ],
        [
            'nome_piatto.required' => 'Inserisci un nome',
            'nome_piatto.unique' => 'Il nome inserito è già esistente',
            'regione.required' => 'Inserisci una regione'
        ]);
        
        $piatto = Piatto::where('codice_piatto', '=', $request->codice_piatto)->first();
        //dd($piatto);
    
        $piatto->nome_piatto = $request->nome_piatto;
        $piatto->regione = $request->regione;

        ///// CHECKBOX //////

        //dd(array($request->ingrediente));
        ($piatto->ingredienti()->sync(($request->ingrediente)));
        //dd($request->nome_ingrediente);

        
        $piatto->update();
        
        return redirect('listapiatti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piatto  $piatto
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice_piatto)
    {
        $piatto = Piatto::find($codice_piatto);

        try {
            $piatto->delete();
            
            
            return redirect('listapiatti');
        
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() == 23000) {
            //dd($e->getCode() == 23000);
            return back()->with('error', 'Non è possibile cancellare il piatto perchè associato a un ingrediente');
            }
        }
        
    
        return redirect('listapiatti');
    }
}

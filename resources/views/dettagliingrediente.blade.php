@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row text-center m-5">
            <h2>Dettagli ingrediente:</h2>
        </div>
        

        <div class="row text-center m-3">
            <div class="col">
                {{ $ingrediente->nome_ingrediente }}
            </div>
            <div class="col">
                {{ $ingrediente->costo }}
            </div>
        </div>
        <div class="row text-center m-5">
            <h2>Elenco piatti:</h2>
        </div>

        @foreach($ingrediente->piatti as $piatto)
            <div class="row m-3">
                <div class="col">
                    <p>{{ $piatto->nome_piatto }}</p>
                </div>
                <div class="col">
                    <p>{{ $piatto->regione }}</p>
                </div>
                <div class="col-2 text-center">
                    <div class="btn btn-info">
                    <a class="text-decoration-none" href="/dettaglipiatto/{{ $piatto->codice_piatto }}">
                        <i class="fa-regular fa-eye"></i> 
                            Mostra
                    </a>
                    </div>
                </div>
                <div class="row text-center mt-5">
                    <div class="col">
                        <div class="btn btn-warning">
                            <a class="text-decoration-none text-white" href="/listaingredienti">
                            Indietro
                            </a>
                        </div>
                    </div>  
                </div>
                
            </div>
        @endforeach
    </div>
@endsection
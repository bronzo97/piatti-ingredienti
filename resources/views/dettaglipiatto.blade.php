@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row text-center m-5">
            <h2>Dettagli piatto:</h2>
        </div>
        

        <div class="row text-center m-3">
            <div class="col">
                {{ $piatto->nome_piatto }}
            </div>
            <div class="col">
                {{ $piatto->regione }}
            </div>
        </div>
        <div class="row text-center m-5">
            <h2>Elenco ingredienti:</h2>
        </div>

        @foreach($piatto->ingredienti as $ing)
            <div class="row m-3">
                <div class="col">
                    <p>{{ $ing->nome_ingrediente }}</p>
                </div>
                <div class="col">
                    <p>{{ $ing->costo }} €</p>
                </div>
                <div class="col">
                    <p>{{ $ing->tipologia }}</p>
                </div>
                <div class="col-2 text-center">
                    <div class="btn btn-info">
                    <a class="text-decoration-none" href="/dettagliingrediente/{{ $ing->codice_ingrediente }}">
                        <i class="fa-regular fa-eye"></i> 
                            Mostra
                    </a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row text-center">
            <h2 class="mt-3">Totale costo piatto:</h2>
        </div>
        <div class="row text-center">
            <div class="col">
                <p>Totale costo piatto: {{ $totale }} €</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <div class="btn btn-warning">
                    <a class="text-decoration-none text-white" href="/listapiatti">
                    Indietro
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
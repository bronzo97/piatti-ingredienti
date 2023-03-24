
@extends('layouts.app')


@section('content')
<div class="container">
    {{-- COUNTER --}}
    <div class="row">
        <div class="col text-center my-card">
            <h2>Totale Piatti</h2>
            <h3>N Piatti: {{  $count_piatti }}</h3>
            <div class="btn btn-primary">
                <a class="text-decoration-none text-white" href="/listapiatti">Visualizza lista piatti</a>
            </div>
        </div>
        <div class="col text-center my-card">
            <h2>Totale Ingredienti</h2>
            <h3>N ingredienti: {{ $count_ingredienti }}</h3>
            <div class="btn btn-primary">
                <a class="text-decoration-none text-white" href="/listaingredienti">Visualizza lista ingredienti</a>
            </div>
        </div>
    </div>
    {{-- SEARCH --}}
    <div class="row">
        <div class="col">
            <h3 class="text-center">Cerca un piatto o un ingrediente</h3>
            <form action="{{ url('/') }}" method="get">
            @csrf
                <div class="row justify-content-center form-inline">
                    <div class="col text-center m-5">
                        <input type="search" class="col form-control" name="search" placeholder="Cerca">
                    </div>
                    <div class="col align-self-center">
                        <input type="submit" class="btn btn-outline-success" value="Cerca">
                    </div>
                </div>
                {{-- PRINT LISTA SEARCH PIATTI --}}
                @if (!$search_ingredienti)
                @elseif (count($search_piatti) > 0)
                    <h2>Lista Piatti:</h2>
                    @foreach($search_piatti as $piatto)
                    <div class="row m-3">
                        <div class="col">
                            {{ $piatto->nome_piatto }}
                        </div>
                        <div class="col">
                            {{ $piatto->codice_piatto }}
                        </div>
                        <div class="col">
                            {{ $piatto->regione }}
                        </div>
                        <div class="col-2 text-center">
                            <div class="btn btn-info">
                                <a class="text-decoration-none text-white" href="/dettaglipiatto/{{ $piatto->codice_piatto }}">
                                <i class="fa-regular fa-eye"></i> 
                                Mostra
                                </a>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="btn btn-warning">
                            <a class="text-decoration-none text-white" href="/modificapiatto/{{ $piatto->codice_piatto }}">
                                <i class="fa-regular fa-pen-to-square"></i> 
                                Modifica
                            </a>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="btn btn-danger">
                            <a class="text-decoration-none text-white" href="/cancella_piatto/{{ $piatto->codice_piatto }}" onclick="return confirm('Sei sicuro di voler cancellare {{ $piatto->nome_piatto }} ?')">
                                <i class="fa-regular fa-trash-can"></i> 
                                    Cancella
                            </a>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                @endif
                {{-- PRINT LISTA SEARCH INGREDIENTI --}}
                @if (!$search_ingredienti)
                @elseif (count($search_ingredienti) > 0)
                    <h2>Lista ingredienti:</h2>
                    @foreach($search_ingredienti as $ingrediente)
                    <div class="row m-3">
                        <div class="col">
                            {{ $ingrediente->nome_ingrediente }}
                        </div>
                        <div class="col">
                            {{ $ingrediente->codice_piatto }}
                        </div>
                        <div class="col">
                            {{ $ingrediente->costo }} €
                        </div>
                        <div class="col">
                            {{ $ingrediente->tipologia }}
                        </div>
                        <div class="col-2 text-center">
                            <div class="btn btn-info">
                                <a class="text-decoration-none text-white" href="/dettagliingrediente/{{ $ingrediente->codice_ingrediente }}">
                                <i class="fa-regular fa-eye"></i> 
                                Mostra
                                </a>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="btn btn-warning">
                            <a class="text-decoration-none text-white" href="/crea_modifica_ingrediente/{{ $ingrediente->codice_ingrediente }}">
                                <i class="fa-regular fa-pen-to-square"></i> 
                                Modifica
                            </a>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="btn btn-danger">
                            <a class="text-decoration-none text-white" href="/cancella_ingrediente/{{ $ingrediente->codice_ingrediente }}" onclick="return confirm('Sei sicuro di voler cancellare {{ $ingrediente->nome_ingrediente }} ?')">
                                <i class="fa-regular fa-trash-can"></i> 
                                Cancella
                            </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

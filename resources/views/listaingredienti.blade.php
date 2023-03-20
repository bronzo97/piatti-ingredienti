@extends('layouts.app')


@section('content')
    <div class="container">
        <h1 class="text-center m-5">Lista Ingredienti</h1>
        <form action="{{ url('listaingredienti') }}" method="get">
        @csrf
            <div class="row">
                <div class="col text-center m-5">
                    <label for="search">Cerca un ingrediente:</label>
                    <input type="search" id="search" name="search" value="{{ old('search_ingredienti') ?? $search_ingredienti }}">

                    <input type="submit" value="Cerca">
                </div>
            </div>
        </form>
        <div class="row text-center mb-5">
            <div class="col">
                <button class="btn btn-primary">
                    <a class="text-decoration-none text-white" href="/crea_modifica_ingrediente">
                        <i class="fa-solid fa-plus"></i> Aggiungi</a>
                </button>
            </div>
        </div>
        @foreach($lista_ingredienti as $ingrediente)
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

        <!-- HANDLES DELETING ERRORS -->
        
        @if(session('error'))
            <div class="alert alert-danger">
                <ul>
                        <li>{{ session('error') }}</li>
                </ul>
            </div>
        @endif
        
        <!-- COUNT TIPOLOGIES TABLE -->
        <h2 class="text-center m-3">Tabella conteggio tipologie</h2>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Ingrediente</th>
                    <th scope="col">Numero ingredienti</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lista_ingredienti->groupBy('tipologia') as $tipologia => $ingredientiTipologia)
                    <tr>
                        <td>{{ $tipologia }}</td>
                        <td>{{ $ingredientiTipologia->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
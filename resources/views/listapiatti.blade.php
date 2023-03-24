@extends('layouts.app')


@section('content')
    <div class="container">
        <h1 class="text-center m-5">Lista Piatti</h1>
        <form action="{{ url('listapiatti') }}" method="get">
        @csrf
        <div class="row">
            <div class="col mb-4 text-center">
                <div class="input-group justify-content-center align-items-center">
                    <label for="search" class="m-2">Cerca un piatto:</label>
                    <div class="form-outline">
                        <input type="search" id="form1" name="search" class="form-control" value="{{ old('search_piatti') ?? $search_piatti }}"/>
                    </div>
                    <input type="submit" class="btn btn-info text-white" value="Cerca">
                </div>
            </div>
        </div>
        </form>
        <div class="row text-center mb-5">
            <div class="col">
                <button class="btn btn-primary">
                    <a class="text-decoration-none text-white" href="/aggiungi_piatto">
                        <i class="fa-solid fa-plus"></i> Aggiungi</a>
                </button>
            </div>
        </div>

        <!-- HANDLES DELETING ERRORS -->

        @if(session('error'))
            <div class="row text-center m-3">
                <div class="alert alert-danger">
                    <ul>
                            <li>{{ session('error') }}</li>
                    </ul>
                </div>
            </div>    
        @endif
        
        <!-- PRINTS LISTA PIATTI -->

        @foreach($lista_piatti as $piatto)
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
        
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            <h2 class="m-5">{{ $title }}</h2>
        </div>
        <div class="row text-center">    
            <form action="{{ url('crea_modifica_ingrediente') }}" method="post">
            @csrf
            <div class="row m-5 d-none">
                    <div class="col">
                        <label for="codice_ingrediente">Codice ingrediente: </label>
                    </div>
                    <div class="col">
                        <input type="text" name="codice_ingrediente" id="codice_ingrediente" value="{{ $ingrediente->codice_ingrediente }}" readonly>
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col">
                        <label for="nome_ingrediente">Nome ingrediente: </label>
                    </div>
                    <div class="col">
                        <input type="text" name="nome_ingrediente" id="nome_ingrediente" value="{{ old('nome_ingrediente') ?? $ingrediente->nome_ingrediente }}">
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col">
                        <label for="costo">Costo: </label>
                    </div>
                    <div class="col">
                        <input type="number" step=".01" name="costo" id="costo" value="{{ old('costo') ?? $ingrediente->costo}}">
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col">
                        <label for="costo">Tipologia: </label>
                    </div>

                    <!-- SELECT -->
                    <div class="col">
                        <select name="tipologia" class="form-control">
                            <option value="0" selected>Selezionare...</option>
                            
                                <option value="Carne" {{ $ingrediente->tipologia == "Carne" ? 'selected' : ''}}>Carne</option>
                                <option value="Pesce" {{ $ingrediente->tipologia == "Pesce" ? 'selected' : ''}}>Pesce</option>
                                <option value="Pasta" {{ $ingrediente->tipologia == "Pasta" ? 'selected' : ''}}>Pasta</option>
                                <option value="Verdura" {{ $ingrediente->tipologia == "Verdura" ? 'selected' : ''}}>Verdura</option>
                                <option value="Altro" {{ $ingrediente->tipologia == "Altro" ? 'selected' : ''}}>Altro</option>
                            
                        </select>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="submit" value="Inserisci" class="btn btn-primary">
                <div class="btn btn-danger">
                    <a class="text-decoration-none text-white" href="/listaingredienti">
                    Annulla
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
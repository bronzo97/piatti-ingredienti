@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row text-center">
            <div class="row">
                <h2 class="m-3">Modifica Piatto:</h2>
            </div>
            <form action="{{ url('modificapiatto/{codice_piatto}') }}" method="post">
            @csrf
                <div class="row m-5 d-none">
                    <div class="col">
                        <label for="codice_piatto">Codice piatto: </label>
                    </div>
                    <div class="col">
                        <input type="text" name="codice_piatto" id="codice_piatto" value="{{ old('codice_piatto') ?? $piatto->codice_piatto }}" readonly>
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col">
                        <label for="nome_piatto">Nome piatto: </label>
                    </div>
                    <div class="col">
                        <input type="text" name="nome_piatto" id="nome_piatto" value="{{ old('nome_piatto') ?? $piatto->nome_piatto }}">
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col">
                        <label for="regione">Regione: </label>
                    </div>
                    <div class="col">
                        <input type="text" name="regione" id="regione" value="{{ old('regione') ?? $piatto->regione }}">
                    </div>
                </div>

                <!-- CHECKBOX -->

                <h2>Ingredienti presenti nel piatto:</h2>
                @foreach($ingredienti as $ingrediente)
                    <div class="row m-2">
                        <div class="col">
                            <label for="{{$ingrediente->nome_ingrediente}}">{{ $ingrediente->nome_ingrediente }}</label>
                            <input type="checkbox" id="{{$ingrediente->nome_ingrediente}}" name="ingrediente[{{$ingrediente->codice_ingrediente}}]" value="{{ $ingrediente->codice_ingrediente }}" {{ ($piatto->ingredienti->contains($ingrediente->codice_ingrediente)) ? 'checked' : '' }}>
                        </div>
                    </div>
                @endforeach
                
                <!-- ERRORS -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="submit" value="Modifica" class="btn btn-primary m-3">
                <div class="btn btn-danger">
                    <a class="text-decoration-none text-white" href="/listapiatti">
                    Annulla
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
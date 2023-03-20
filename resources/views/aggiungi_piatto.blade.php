@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            <h2 class="m-5">Aggiungi un Piatto</h2>
        </div>
        <div class="row text-center">    
            <form action="{{ url('aggiungi_piatto') }}" method="post">
            @csrf
                <div class="row m-5">
                    <div class="col">
                        <label for="nome_piatto">Nome piatto: </label>
                    </div>
                    <div class="col">
                        <input type="text" name="nome_piatto" id="nome_piatto" value="{{ old('nome_piatto') ?? '' }}">
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col">
                        <label for="regione">Regione: </label>
                    </div>
                    <div class="col">
                        <input type="text" name="regione" id="regione" value="{{ old('regione') ?? '' }}">
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

                <input type="submit" value="Crea" class="btn btn-primary">
                <div class="btn btn-danger">
                    <a class="text-decoration-none text-white" href="/listapiatti">
                    Annulla
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')


@section('content')
<div class="container">
            <h1 class="text-center m-5">Dashboard</h1>
            <div class="row">
                <div class="col text-center">
                    <h2>Totale Piatti</h2>
                    <h3>N Piatti: {{  $count_piatti }}</h3>
                    <div class="btn btn-primary"><a class="text-decoration-none text-white" href="/listapiatti">Visualizza lista piatti</a></div>

                </div>
                <div class="col text-center">
                    <h2>Totale Ingredienti</h2>
                    <h3>N ingredienti: {{ $count_ingredienti }}</h3>
                    <div class="btn btn-primary"><a class="text-decoration-none text-white" href="/listaingredienti">Visualizza lista ingredienti</a></div>

                </div>
            </div>
        </div>
@endsection

@extends('layouts.main')

@section('title', 'Produtos')

@section('content')

    <h1>Tela produtos</h1>

    @if($busca != '') {{--quando busca for diferente de vazio--}}
        <p>O usuário está buscando por: {{ $busca }}</p> {{--vai imprimir o nome da busca--}}
    @endif

@endsection
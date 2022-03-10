{{--herança--}}
@extends('layouts.main')

{{--colocando titulo--}}
@section('title', 'produtos')

{{--informando o corpo body que vai no html--}}
@section('content')

    @if($id != null) {{--Se o id for diferente de null--}}
        <br><p>Exibindo produto id: {{$id}}</p> {{--Imprime essa frase--}}
    @endif  {{--se não imprime nada, null--}}

@endsection
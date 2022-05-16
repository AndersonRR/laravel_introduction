@extends('layout')

@section('title')
    Temporadas de {{$serie->nome}}
@endsection

@section('btn-header')
    <a href="{{ route('home') }}" class="btn btn-dark">Voltar</a>   
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between">
                <a href="/temporadas/{{ $temporada->id }}/episodios">Temporada {{$temporada->numero + 1}}</a>
                <span class="badge bg-secondary d-flex align-items-center">
                    {{ $temporada->getEpisodiosAssistidos()->count() }}/{{ $temporada->episodios->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection
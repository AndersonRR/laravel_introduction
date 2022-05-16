@extends('layout')

@section('title')
    Adicionar nova série
@endsection

@section('btn-header')
    <a href="{{ route('home') }}" class="btn btn-dark">Voltar</a>   
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>    
    @endif

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="col-md-2">
                <label for="qtd_temporada" class="form-label">Temporadas</label>
                <input type="number" class="form-control" name="qtd_temporadas">
            </div>
            <div class="col-md-2">
                <label for="eps_temporada" class="form-label">Episódios</label>
                <input type="number" class="form-control" name="eps_temporada">
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 mt-3">
                <label for="capa" class="form-label">Capa</label>
                <input type="file" class="form-control" name="capa" id="capa">
            </div>
        </div>  
        <button class="btn btn-success mt-2">Adicionar</button>
    </form>
@endsection
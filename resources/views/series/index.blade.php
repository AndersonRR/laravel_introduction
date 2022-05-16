@extends('layout')

@section('title')
    Séries
@endsection

@section('btn-header')
    <a href="{{ route('form_create_serie') }}" class="btn btn-success">Adicionar</a>
@endsection

@section('conteudo')
    @if ($mensagem)
        <div class="alert alert-success">
            {{$mensagem}}
        </div>
    @endif
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                
                <div>
                    <img src="{{ $serie->capa_url }}" class="img-thumbnail" height="100px" width="100px">
                    <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
                </div>

                <div id="input-nome-serie-{{ $serie->id }}" class="d-none">
                    <div class="input-group-w-50 d-flex">
                        <input type="text" class="form-control me-1" value="{{ $serie->nome }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }}, this)">
                                <i class="fa fa-check fa-fw"></i>
                            </button>
                            @csrf
                        </div>
                    </div>
                </div>

                <span class="d-flex">
                    <div class="btn btn-secondary btn-sm me-1" onclick="toggleInput({{ $serie->id }})">
                        <i class="fa fa-edit"></i>
                    </div>
                    <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm me-1">
                        <i class="fa fa-external-link fa-fw"></i>
                    </a>
                    <form method="post" action="series/{{$serie->id}}"
                        onsubmit="return confirm('Tem certeza que deseja remover a série {{ addslashes($serie->nome) }}')"    
                    >
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash fa-fw"></i></button>
                    </form>
                </span>
            </li>
        @endforeach
    </ul>
@endsection

@section('script')
    <script type="text/javascript">
        const prefixNome  = "#nome-serie-";
        const prefixInput = "#input-nome-serie-";

        const toggleInput = (serieId) => {
            $(`${prefixNome}${serieId},${prefixInput}${serieId}`).toggleClass('d-none');
        }

        const editarSerie = (serieId, btn) => {
            const url = `/series/${serieId}/editaNome`;
            const _token = $(btn).parent().find('input').first().val();
            const nome = $(`${prefixInput}${serieId}`).find('input').first().val();
            $.post(url, { _token, nome })
            .done((data) => {
                $(`${prefixNome}${serieId}`).html(nome); 
                $(`${prefixNome}${serieId},${prefixInput}${serieId}`).toggleClass('d-none');
             })
            .fail(() => alert("Erro ao atualizar série"));
        }
    </script>
@endsection
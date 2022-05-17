<?php

namespace App\Services;

use App\{Episodio, Serie, Temporada};
use App\Events\SerieApagada;
use App\Jobs\ExcluirCapaSerie;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie(int $serieId) : string
    {
        $nomeSerie = '';

        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $serieobj= (object) $serie->toArray();
            $nomeSerie = $serie->nome;
            $this->removerTemporadas($serie);
            $serie->delete();

            $evento = new SerieApagada($serieobj);
            // event($evento);
            ExcluirCapaSerie::dispatch($serieobj);
        });

        return $nomeSerie;
    }

    public function removerTemporadas(Serie $serie)
    {
        $serie->temporadas->each(function(Temporada $temporada){
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    public function removerEpisodios(Temporada $temporada)
    {
        $temporada->episodios->each(function(Episodio $episodio){
            $episodio->delete();
        });
    }
}

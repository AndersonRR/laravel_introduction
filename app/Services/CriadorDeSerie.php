<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie{
    public function criarSerie(string $nomeSerie, int $qtdTemporada, int $epPorTemporada, ?string $capa) : Serie
    {
        //TODO: separar métodos: criarTemporada e criarEpisodio
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie, 'capa' => $capa]);

        for ($i=0; $i < $qtdTemporada; $i++) { 
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j=0; $j < $epPorTemporada; $j++) { 
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        DB::commit();

        return $serie;
    }
}
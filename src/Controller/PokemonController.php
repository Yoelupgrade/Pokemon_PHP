<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class PokemonController {

    /**
     * @Route("/Pokemon")
     */
    public function showPokemon () {	
        return new Response("Soy un Pokemon");
    }

}
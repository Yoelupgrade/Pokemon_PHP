<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController {

    /**
     * @Route("/pokemon")
     */
    public function showPokemon () {	
        $pokemon=["name"=>"Charmander","id"=>4,"image"=> "https://assets.pokemon.com/assets/cms2/img/pokedex/full/004.png", "description"=> "Este Pokémon nace con una llama en la punta de la cola. Si se le apagara, fallecería." ];
       return $this->render('pokemons/showpokemon.html.twig', ["pokemon"=>$pokemon]);
    }

}

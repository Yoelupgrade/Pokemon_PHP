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

      /**
     * @Route("/pokemons")
     */
    public function listPokemons () {	
        $pokemons=[
            ["name"=>"Charmander","id"=>4,"image"=> "https://assets.pokemon.com/assets/cms2/img/pokedex/full/004.png", "description"=> "Este Pokémon nace con una llama en la punta de la cola. Si se le apagara, fallecería." ],
            ["name"=>"Mr. Mime","id"=>122,"image"=> "https://assets.pokemon.com/assets/cms2/img/pokedex/full/122.png", "description"=> "Muchos estudiosos sostienen que el desarrollo de sus enormes manos se debe a su afán por practicar la pantomima." ],
            ["name"=>"Goldeen","id"=>118,"image"=> "https://assets.pokemon.com/assets/cms2/img/pokedex/full/118.png", "description"=> "Sus aletas pectorales, caudal y dorsal ondean gráciles en el agua. Por eso se le llama el Bailarín Acuático" ],
        ];
       return $this->render('pokemons/listPokemon.html.twig', ["pokemons"=>$pokemons]);
    }


}

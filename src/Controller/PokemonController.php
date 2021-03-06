<?php

namespace App\Controller;

use App\Entity\Debilidad;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Pokemon;
use App\Form\PokemonFormType;
use Doctrine\ORM\EntityManagerInterface;

class PokemonController extends AbstractController {

    /**
     * @Route("/pokemon/{id}", name="showPokemon")
     */
    public function showPokemon ($id, EntityManagerInterface $doctrine) {
        
        $repository = $doctrine->getRepository(Pokemon::class);
        $pokemon = $repository->find($id);

        return $this->render('pokemons/showpokemon.html.twig', ["pokemon"=>$pokemon]);
    }

    /**
     * @Route("/pokemons", name="listPokemons")
     */
    public function listPokemons(EntityManagerInterface $doctrine) {
        $repository = $doctrine->getRepository(Pokemon::class);	
        $pokemons=$repository->findAll();
       return $this->render('pokemons/listPokemon.html.twig', ["pokemons"=>$pokemons]);
    }

    /**
     * @Route("/createPokemon")
     */
    public function insertPokemon(EntityManagerInterface $doctrine) {
       
        $debilidad = new Debilidad();
       $debilidad-> setName('planta');
       $debilidad2 = new Debilidad();
       $debilidad2-> setName('electrico');
       

        $pokemon = new Pokemon();
        $pokemon->setName('Charmeleon');
        $pokemon->setDescription('Es como el otro pero más grande vale');
        $pokemon->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/005.png');
        $pokemon->addDebilidade($debilidad);
        $pokemon2 = new Pokemon();
        $pokemon2->setName('Charizard');
        $pokemon2->setDescription('Es como el otro pero más grande todavía vale');
        $pokemon2->setImage('https://assets.pokemon.com/assets/cms2/img/pokedex/full/006.png');



        $doctrine->persist($pokemon);
        $doctrine->persist($pokemon2);
        $doctrine->persist($debilidad);
        $doctrine->persist($debilidad2);
        $doctrine->flush();

        return $this->render("base.html.twig");
    }

    /**
     * @Route("/create/pokemon", name="createPokemon")
     * @IsGranted("ROLE_ADMIN")
     */

    public function addPokemon(Request $request, EntityManagerInterface $doctrine)
    {
        $form = $this->createForm(PokemonFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pokemon = $form->getData();
            $doctrine->persist($pokemon);
            $doctrine->flush();
            $this->addFlash('exito', 'Pokemon insertado correctamente');
            return $this->redirectToRoute('listPokemons');
        }
        return $this->renderForm("pokemons/createPokemon.html.twig", ["pokemonForm" => $form]);
    }

    /**
     * @Route("/pokemonsDebilidad/{id}")
     */
    public function pokemonsDebilidad($id, EntityManagerInterface $doctrine)
    {
        $repository = $doctrine->getRepository(Pokemon::class);
        $pokemons = $repository->findPokemonsByDebilidad($id);

        return $this->render("pokemons/listPokemon.html.twig",  ["pokemons"=>$pokemons]);
    }

}

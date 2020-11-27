<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameProfileController extends AbstractController
{
    /**
     * @Route("/game/profile/{id}", name="game_profile_id", methods={"GET"})
     */
    public function index(Game $game): Response
    {
        return $this->render('game_profile/index.html.twig', [
            'game' => $game
        ]);
    }

}

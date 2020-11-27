<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameProfileController extends AbstractController
{
    /**
     * @Route("/game/profile", name="game_profile")
     */
    public function index(): Response
    {
        return $this->render('game_profile/index.html.twig', [
            'controller_name' => 'GameProfileController',
        ]);
    }
}

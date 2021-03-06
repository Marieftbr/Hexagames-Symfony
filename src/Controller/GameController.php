<?php


namespace App\Controller;


use App\Entity\Game;
use App\Form\GameType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        //return $this->render('comment/index.html.twig', [
        //    'games' => $GameRepository->findAll(),
        //]);
    }

    /**
     * @Route("/new", name="new_game")
     */
    public function new(Request $request, FileUploader $uploader)
    {

        $game = new Game();
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $photoFile = $form["photo"]->getData();
            $filepath= $uploader->upload($photoFile);
            $game->setPhoto($filepath);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($game);
            $entityManager->flush();

        }
        return $this->render('game/game.html.twig', [
            'game_form' => $form->createView(),
        ]);
    }
}
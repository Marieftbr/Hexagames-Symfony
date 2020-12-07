<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Game;
use App\Form\CommentType;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class GameProfileController extends AbstractController
{
    /**
     * @Route("/game/profile/{id}", name="game_profile_id", methods={"GET"})
     */
    public function index(Game $game): Response
    {
        return $this->render('game_profile/index.html.twig', [
            'game' => $game,
            'categories' => $game->getCategories()

        ]);
    }

    /**
     * @Route("/comment/add/{id}", name="game_add_comment", methods={"GET", "POST"})
     */
    public function addComment(Game $game, Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $comment->setGame($game);

            $entityManager->persist($comment);
            $entityManager->flush();

        }
        return $this->render('game_profile/add.html.twig', [
            'comment_form' => $form->createView(),
        ]);



    }

}

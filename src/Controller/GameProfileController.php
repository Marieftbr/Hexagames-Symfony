<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Game;
use App\Entity\Note;
use App\Entity\User;
use App\Form\CommentType;
use App\Form\NoteType;
use App\Repository\GameRepository;
use App\Repository\NoteRepository;
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
    public function index(Game $game, NoteRepository $noteRepository): Response
    {
        $notes = $noteRepository->findBy([
            "game" => $game
        ]);

        $average = 0;

        if(!empty($notes)) {
            $numericNotes = array_map(function($note) {
                return $note->getNote();
            }, $notes);
            $average = array_sum($numericNotes) / count($notes);
        }

        $game->setNote($average);

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
            $comment->setCreatedAt(new \DateTime());
            $comment->setUser($this->getUser());


            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute("game_profile_id", ["id" => $game->getId()]);

        }
        return $this->render('game_profile/add_comment.html.twig', [
            'comment_form' => $form->createView(),
        ]);



    }

    /**
     * @Route("/note/add/{id}", name="game_set_note", methods={"GET", "POST"})
     */
    public function setNote(Game $game, Request $request, EntityManagerInterface $entityManager, NoteRepository $noteRepository)
    {
        $currentNote = $noteRepository->findOneBy([
            "user" => $this->getUser(),
            "game" => $game
        ]);

        $note = !is_null($currentNote) ? $currentNote : new Note();
        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $note->setGame($game);
            $note->setUser($this->getUser());

            $entityManager->persist($note);
            $entityManager->flush();

            return $this->redirectToRoute("game_profile_id", ["id" => $game->getId()]);
        }

        return $this->render('game_profile/set_note.html.twig', [
            'note_form' => $form->createView(),
            'current_note' => !is_null($currentNote) ? $currentNote->getNote() : 0
        ]);
    }

}

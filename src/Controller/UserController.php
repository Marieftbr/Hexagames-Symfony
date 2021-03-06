<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CommentType;
use App\Form\SelectGamesType;
use App\Form\SelectHexapotesType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\CssSelector\Parser\Handler\CommentHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        /** @var $user User */
        $user = $this->getUser();

        if($user) {
            return $this->redirectToRoute("user_profile_id", ["id" => $user->getId()]);
        }

        return $this->redirectToRoute("connexion");
    }

    /**
     * @Route("/user/profile/{id}", name="user_profile_id")
     */
    public function show(User $user)
    {
        return $this->render('user/index.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/user/select-games", name="user_select_games")
     */
    public function selectGames(Request $request, EntityManagerInterface $entityManager)
    {
        /** @var $user User */
        $user = $this->getUser();

        $form = $this->createForm(SelectGamesType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setMyGames($form->getData()["games"]);
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute("user_profile_id", ["id" => $user->getId()]);
        } else {
            $form->setData(["games" => $user->getMyGames()]);
        }

        return $this->render('user/add-games.html.twig', [
            'select_games_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/select-hexapotes", name="user_select_hexapotes")
     */
    public function selectHexapotes(Request $request, EntityManagerInterface $entityManager)
    {
        /** @var $user User */
        $user = $this->getUser();

        $form = $this->createForm(SelectHexapotesType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setMyHexapotes($form->getData()["hexapotes"]);
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute("user_profile_id", ["id" => $user->getId()]);
        } else {
            $form->setData(["MyHexapotes" => $user->getMyHexapotes()]);
        }

        return $this->render('user/add-hexapotes.html.twig', [
            'select_hexapotes_form' => $form->createView()
        ]);
    }
}

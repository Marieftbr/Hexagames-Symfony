<?php


namespace App\Controller;


use App\Form\LudoType;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LudoController extends AbstractController
{
    /**
     * @Route("/ludotheque", name="ludotheque", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, GameRepository $gameRepository): Response
    {
        $form = $this->createForm(LudoType::class);
        $form->handleRequest($request);




        return $this->render('ludotheque/la-ludotheque.html.twig', [
            'ludo_form' => $form->createView(),
            'games' => $gameRepository->findAll(),
        ]);
    }
}
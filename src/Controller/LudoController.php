<?php


namespace App\Controller;


use App\Form\LudoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LudoController extends AbstractController
{
    /**
     * @Route("/ludotheque")
     * @param Request $request
     * @return Response
     */
    public function show(Request $request): Response
    {
        $form = $this->createForm(LudoType::class);
        $form->handleRequest($request);
        //data = $form->getData();



        return $this->render('ludotheque/la-ludotheque.html.twig', [
            'ludo_form' => $form->createView(),
        ]);
    }
}
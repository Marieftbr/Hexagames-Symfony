<?php


namespace App\Controller;


use App\Form\LudoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LudoController extends AbstractController
{
    /**
     * @Route("/ludotheque")
     */
    public function show(): Response
    {
        $form = $this->createForm(LudoType::class);
        return $this->render('ludotheque/la-ludotheque.html.twig', [
            'ludo_form' => $form->createView(),
        ]);
    }
}
<?php


namespace App\Controller;


use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    /**
     * @Route("/inscription")
     */
    public function show(): Response
    {
        $form= $this->createForm(InscriptionType::class);
        return $this->render('inscription/inscription.html.twig', [
            'inscription_form' => $form->createView(),
        ]);
    }
}
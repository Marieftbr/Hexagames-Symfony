<?php


namespace App\Controller;


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
        return $this->render('ludotheque/la-ludotheque.html.twig');
    }
}
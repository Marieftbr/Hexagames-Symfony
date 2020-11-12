<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyLudoController extends AbstractController
{
    /**
     * @Route("/ma/ludotheque")
     */
    public function show(): Response
    {
        return $this->render('my-ludotheque/ma-ludotheque.html.twig');
    }

}
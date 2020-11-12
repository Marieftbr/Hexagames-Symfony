<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyHexapoteController extends AbstractController
{
    /**
     * @Route("/mes/hexapotes")
     */
    public function show(): Response
    {
        return $this->render('my-hexapotes/mes-hexapotes.html.twig');
    }
}
<?php


namespace App\Controller;


use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/connexion", name="connexion")
     */
    public function show(): Response
    {
        $form= $this->createForm(LoginType::class);
        return $this->render('login/login.html.twig', [
            'login_form' => $form->createView(),
        ]);

    }
}
<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SidebarController extends AbstractController
{
    /**
     * @Route("/sidebar", name="sidebar")
     */
    public function index(User $user): Response
    {

        return $this->render('base.html.twig', [
            'controller_name' => 'SidebarController',
            'user' => $user
        ]);
    }
}

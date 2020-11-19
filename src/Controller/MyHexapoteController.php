<?php


namespace App\Controller;


use App\Form\MyHexapotesType;
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
        $form = $this->createForm(MyHexapotesType::class);
        return $this->render('my-hexapotes/mes-hexapotes.html.twig', [
            'my_hexapotes_form' => $form->createView(),
        ]);
    }
}
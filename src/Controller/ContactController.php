<?php


namespace App\Controller;


use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact")
     */
    public function show(): Response
    {
        $form= $this->createForm(ContactType::class);
        return $this->render('contact/contact.html.twig', [
            'contact_form' => $form->createView(),
        ]);
    }


}
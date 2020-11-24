<?php

namespace App\Controller;

use App\Entity\Editor;
use App\Form\EditorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditorController extends AbstractController
{
    /**
     * @Route("/editor", name="editor")
     */
    public function index(): Response
    {
        return $this->render('editor/index.html.twig', [
            'controller_name' => 'EditorController',
        ]);
    }

    /**
     * @Route("/new/editor", name="new_editor")
     */
    public function new(Request $request)
    {
        $editor = new Editor();
        $form = $this->createForm(EditorType::class, $editor);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($editor);
            $entityManager->flush();

        }
        return $this->render('admin/editor.html.twig', [
            'editor_form' => $form->createView(),
        ]);
    }
}

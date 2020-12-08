<?php

namespace App\Controller;

use App\Entity\Note;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NoteController extends AbstractController
{
    /**
     * @Route("/note", name="note")
     */
    public function index(): Response
    {
        return $this->render('note/index.html.twig', [
            'controller_name' => 'NoteController',
        ]);
    }

    public function calculMoyenne(Note $note)
    {
        $notes[] = $note->getNote();
        $i = 0;
        foreach ($notes as $note) {
            $i++;
            $notes += $note;

        }
        $moyenne = $notes / $i;
    }
}

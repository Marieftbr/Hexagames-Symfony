<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Game;
use App\Form\EventType;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/sessions", name="sessions", methods={"GET", "POST"})
     */
    public function index(Request $request, EventRepository $eventRepository): Response
    {
        $event = new Event();

        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($event);
            $entityManager->flush();
        }

        $events = $eventRepository->findAll();

        return $this->render('event/index.html.twig', [
            'createEvent' => $form->createView(),
            'events' => $events
        ]);
    }
}

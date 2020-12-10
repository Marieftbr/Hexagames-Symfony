<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SettingsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    /**
     * @Route("/settings", name="settings")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $form = $this->createForm(SettingsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if ($data["password"]) {
                $user->setPassword($data["password"]);
            }

            $user->setPseudo($data["pseudo"]);
            $user->setFirstname($data["firstname"]);
            $user->setLastname($data["lastname"]);
            $user->setAge($data["age"]);
            $user->setCity($data["city"]);
            $user->setEmail($data["mail"]);
            $entityManager->persist($user);
            $entityManager->flush();
        } else {
            $form->setData([
                "pseudo" => $user->getPseudo(),
                "firstname" => $user->getFirstname(),
                "lastname" => $user->getLastname(),
                "age" => $user->getAge(),
                "city" => $user->getCity(),
                "mail" => $user->getEmail(),
                "password" => "",
            ]);
        }

        return $this->render('settings/index.html.twig', [
            'form_settings' => $form->createView(),
        ]);
    }
}

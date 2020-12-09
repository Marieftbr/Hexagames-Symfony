<?php


namespace App\Controller;


use App\Form\LudoType;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LudoController extends AbstractController
{
    /**
     * @Route("/ludotheque", name="ludotheque", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, GameRepository $gameRepository): Response
    {
        $form = $this->createForm(LudoType::class);
        $form->handleRequest($request);

        $formCriterias = $form->getData();

        $queryBuilder = $gameRepository->createQueryBuilder("game")
            ->select();

        if (isset($formCriterias["types"])) {
            $queryBuilder->andWhere("game.types = :type")
                ->setParameter("type", $formCriterias["types"]);
        }

        if (isset($formCriterias["editor"])) {
            $queryBuilder->andWhere("game.editor = :editor")
                ->setParameter("editor", $formCriterias["editor"]);
        }

        if (isset($formCriterias["playerNumberMin"])) {
            $queryBuilder->andWhere("game.playerNumberMin = :playerNumberMin")
                ->setParameter("playerNumberMin", $formCriterias["playerNumberMin"]);
        }

        if (isset($formCriterias["playerNumberMax"])) {
            $queryBuilder->andWhere("game.playerNumberMax = :playerNumberMax")
                ->setParameter("playerNumberMax", $formCriterias["playerNumberMax"]);
        }

        if (isset($formCriterias["ageMin"])) {
            $queryBuilder->andWhere("game.ageMin <= :ageMin")
                ->setParameter("ageMin", $formCriterias["ageMin"]);
        }

        if (isset($formCriterias["duration"])) {
            $queryBuilder->andWhere("game.duration <= :duration")
                ->setParameter("duration", $formCriterias["duration"]);
        }

        if (isset($formCriterias["category"])) {
            $queryBuilder
                ->innerJoin("game.categories", "category")
                ->andWhere("category.id = :category")
                ->setParameter("category", $formCriterias["category"]);
        }

        return $this->render('ludotheque/la-ludotheque.html.twig', [
            'ludo_form' => $form->createView(),
            'games' => $queryBuilder->getQuery()->execute(),
        ]);
    }
}
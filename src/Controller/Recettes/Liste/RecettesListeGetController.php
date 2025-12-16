<?php

declare(strict_types=1);

namespace App\Controller\Recettes\Liste;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(
    path: '/recettes/liste',
    name: 'app_recettes_liste_get',
)]
class RecettesListeGetController extends AbstractController
{
    public function __construct(
        private readonly RecetteRepository $recetteRepository,
    ) {}

    public function __invoke(): Response
    {
        $allRecettes = $this->recetteRepository->getAllForListe();

        return $this->render(
            view: 'pages/recettes/liste/list.html.twig',
            parameters: [
                'recettes' => $allRecettes,
            ],
        );
    }
}

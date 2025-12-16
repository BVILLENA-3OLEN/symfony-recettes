<?php

declare(strict_types=1);

namespace App\Controller\Recettes\Details;

use App\Entity\Recette;
use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(
    path: '/recettes/{id}/détails',
    name: 'app_recettes_details_get',
)]
class RecettesDetailsGetController extends AbstractController
{
    public function __construct(
        private readonly RecetteRepository $recetteRepository,
    ) {}

    public function __invoke(Recette $recette): Response
    {
        return $this->render(
            view: 'pages/recettes/details/page.html.twig',
            parameters: [
                'recette' => $this->recetteRepository->getForDetails(
                    recette: $recette,
                ),
            ]
        );
    }
}

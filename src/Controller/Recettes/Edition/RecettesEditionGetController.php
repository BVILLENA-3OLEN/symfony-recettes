<?php

declare(strict_types=1);

namespace App\Controller\Recettes\Edition;

use App\Entity\Recette;
use App\Form\RecetteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route(
    path: '/recettes/{id}/édition',
    name: 'app_recettes_edition_get',
    methods: [Request::METHOD_GET],
)]
#[IsGranted('ROLE_ADMIN')]
class RecettesEditionGetController extends AbstractController
{
    public function __invoke(Recette $recette): Response
    {
        $form = $this->createForm(RecetteType::class, $recette);

        return $this->render(
            view: 'pages/recettes/edition/form.html.twig',
            parameters: [
                'form' => $form,
            ],
        );
    }
}

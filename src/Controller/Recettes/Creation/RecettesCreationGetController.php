<?php

declare(strict_types=1);

namespace App\Controller\Recettes\Creation;

use App\Form\RecetteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(
    path: '/recettes/création',
    name: 'app_recettes_creation_get',
    methods: [Request::METHOD_GET]
)]
class RecettesCreationGetController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        // Sur l'affichage du formulaire de création, pas besoin d'affecter les données à une instance
        $form = $this->createForm(RecetteType::class);

        return $this->render(
            view: 'pages/recettes/creation/form.html.twig',
            parameters: [
                'form' => $form,
            ]
        );
    }
}

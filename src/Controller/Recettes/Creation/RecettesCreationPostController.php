<?php

declare(strict_types=1);

namespace App\Controller\Recettes\Creation;

use App\Entity\Recette;
use App\Form\RecetteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(
    path: '/recettes/création',
    name: 'app_recettes_creation_post',
    methods: [Request::METHOD_POST]
)]
class RecettesCreationPostController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {}

    public function __invoke(Request $request): Response
    {
        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($recette);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_recettes_liste_get');
        }

        // Gestion des erreurs
        return $this->render(
            view: 'pages/recettes/creation/form.html.twig',
            parameters: [
                'form' => $form,
            ]
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Controller\Recettes\Edition;

use App\Entity\Recette;
use App\Form\RecetteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route(
    path: '/recettes/{id}/édition',
    name: 'app_recettes_edition_post',
    methods: [Request::METHOD_POST],
)]
#[IsGranted('ROLE_ADMIN')]
class RecettesEditionPostController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {}

    public function __invoke(Request $request, Recette $recette): Response|RedirectResponse
    {
        $form = $this->createForm(RecetteType::class, $recette);

        $form->handleRequest($request);
        if ($form->isSubmitted() === false || $form->isValid() === false) {
            return $this->render(
                view: 'pages/recettes/edition/form.html.twig',
                parameters: [
                    'form' => $form,
                ],
            );
        }

        $this->entityManager->flush();

        return $this->redirectToRoute(
            route: 'app_recettes_details_get',
            parameters: [
                'id' => $recette->getId(),
            ]
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/hello/{name}', name: 'app_index_get')]
class IndexController extends AbstractController
{
    public function __invoke(Request $request, string $name = 'there')
    {
        dump($request->query->get('module'));

        return $this->render(
            view: 'index.html.twig',
            parameters: [
                'nom_utilisateur' => $name,
            ]
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Controller\Tests;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/tests/components')]
class TestsComponentsController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('tests/components/page.html.twig');
    }
}

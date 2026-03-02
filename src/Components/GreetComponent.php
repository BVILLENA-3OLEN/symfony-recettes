<?php

declare(strict_types=1);

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(
    name: 'greet',
    template: 'components/twig/greet/greet.component.html.twig'
)]
class GreetComponent
{
    public string $name = '';
}

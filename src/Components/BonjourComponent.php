<?php

declare(strict_types=1);

namespace App\Components;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;

#[AsLiveComponent(
    name: 'bonjour',
    template: 'components/live/bonjour/bonjour.component.html.twig',
)]
class BonjourComponent
{
    use DefaultActionTrait;
    use ValidatableComponentTrait;

    #[LiveProp(writable: true)]
    #[NotBlank]
    #[Length(max: 25)]
    public string $nom = '';

    #[LiveAction]
    public function bonjour(): void
    {
        $this->validate();
    }

    #[LiveAction]
    public function reset(): void
    {
        $this->nom = '';
    }
}

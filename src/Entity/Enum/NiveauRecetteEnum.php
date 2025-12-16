<?php

declare(strict_types=1);

namespace App\Entity\Enum;

enum NiveauRecetteEnum: string
{
    case FACILE = 'FACILE';
    case INTERMEDIAIRE = 'INTERMEDIAIRE';
    case DIFFICILE = 'DIFFICILE';
}

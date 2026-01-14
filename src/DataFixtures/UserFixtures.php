<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
    ) {}

    public function load(ObjectManager $manager): void
    {
        // Admin
        $admin = new User();
        $admin->setEmail('admin@admin.fr');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword(
            $this->passwordHasher->hashPassword(
                user: $admin,
                plainPassword: 'azerty',
            )
        );
        $manager->persist($admin);

        // Billy
        $billy = new User();
        $billy->setEmail('billy@villena.fr');
        $billy->setRoles([]);
        $billy->setPassword(
            $this->passwordHasher->hashPassword(
                user: $admin,
                plainPassword: 'azerty',
            )
        );
        $manager->persist($billy);

        $manager->flush();
    }
}

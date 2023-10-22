<?php

declare(strict_types=1);

namespace App\Support;

use App\Entity\Admin;
use App\Repository\AdminRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateAdminSupport
{
    public function __construct(
        private readonly AdminRepository $adminRepository,
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function create(string $email, string $password): void
    {
        $user = $this->adminRepository->findOneBy(['email' => $email]);

        if (!$user) {
            $user = new Admin();
            $user->setEmail($email);
    
            $password = $this->passwordHasher->hashPassword($user, $password);
            $user->setPassword($password);
        }


        $user->setRoles(['ROLE_ADMIN']);

        $this->adminRepository->save($user, true);
    }
}

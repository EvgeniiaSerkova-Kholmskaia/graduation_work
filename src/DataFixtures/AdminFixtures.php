<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Persistence\ObjectManager;

class AdminFixtures extends Fixture
{
    private $encoder;

    private $em;

    public function __construct(UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager)
    {
        $this->encoder = $encoder;
        $this->em = $entityManager;
    }

    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        $adminsData = [
              0 => [
                  'email' => 'admin@mail.com',
                  'role' => ['ROLE_ADMIN'],
                  'password' => 'admin123'
              ]
        ];

        foreach ($adminsData as $admin) {
            $newAdmin = new Admin();
            $newAdmin->setEmail($admin['email']);
            $newAdmin->setPassword($this->encoder->encodePassword($newAdmin, $admin['password']));
            $newAdmin->setRoles($admin['role']);
            $this->em->persist($newAdmin);
        }

        $this->em->flush();
    }
}

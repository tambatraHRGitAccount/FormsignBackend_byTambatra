<?php

namespace App\EventListener;

use App\Entity\UserLog;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event): void
    {
        $user = $event->getAuthenticationToken()->getUser();
        if ($user instanceof \App\Entity\User) {
            $userLog = new UserLog();
            $userLog->setUser($user);
            $userLog->setLoginTime(new \DateTime());
            $this->entityManager->persist($userLog);
            $this->entityManager->flush();
        }
    }
}
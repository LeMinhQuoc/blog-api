<?php
namespace App\EventListener;

use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;


class JWTCreatedListener
{

    protected $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct( UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @param JWTDecodedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $payload  = $event->getData();
        $user = $this->userRepository->findOneBy(['username' => $payload['username']]);
        $payload['userId'] =  $user->getId();

        $event->setData($payload);
    }
}

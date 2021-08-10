<?php


namespace App\Controller;


use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController{

    /**
     * @Route("/{getUserInfo}", name="getUserInfo")
     */
        public function getUserInfo(TokenStorageInterface $tokenStorageInterface, JWTTokenManagerInterface $jwtManager)
        {
            var_dump($jwtManager->decode($tokenStorageInterface->getToken()));
        }

}

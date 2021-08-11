<?php


namespace App\Controller;


use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController{

    /**
     * @Route("/{id}", name="getUserInfo")
     */
        public function getUserInfo(TokenStorageInterface $tokenStorageInterface, JWTTokenManagerInterface $jwtManager,string $id)
        {
            $tokenParts = explode(".",$id);
            $tokenHeader = base64_decode($tokenParts[0]);
            $tokenPayload = base64_decode($tokenParts[1]);
            $jwtHeader = json_decode($tokenHeader);
            $jwtPayload = json_decode($tokenPayload);
            var_dump($jwtPayload);
        }

}

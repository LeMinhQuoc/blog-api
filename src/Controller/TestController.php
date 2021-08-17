<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Helper\APIHelper;
use App\Entity\Like;
use App\Repository\LikeRepository;

class TestController extends AbstractController{
    #[Route('/api/check ', name: 'check', methods: ['POST'])]
        public function getUserInfo(APIHelper $helper, Request $input)
        {
            $data = json_decode($input->getContent(),true);
            $token = $data['token'];
            $bId = $data['idBlog'];
            $tokenParts = explode(".",$token);
            $tokenHeader = base64_decode($tokenParts[0]);
            $tokenPayload = base64_decode($tokenParts[1]);
            $jwtHeader = json_decode($tokenHeader);
            $jwtPayload = json_decode($tokenPayload);
            $helper->getLike($bId,$jwtPayload->userId,$token);

        }

    #[Route('/delikes ', name: 'delike', methods: ['POST'])]
    public function getLikeId(LikeRepository $re,Request $input)
    {
        $data = json_decode($input->getContent(),true);

        $repository = $this->getDoctrine()->getRepository(Like::class);
        $like = $repository->findOneBy(
            ['idPost' =>$data["idBlog"],
            'idUser' =>$data["idUser"]]
        );


var_dump($like);



    }
}

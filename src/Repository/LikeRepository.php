<?php

namespace App\Repository;

use App\Entity\Like;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use  \mysqli;

/**
 * @method Like|null find($id, $lockMode = null, $lockVersion = null)
 * @method Like|null findOneBy(array $criteria, array $orderBy = null)
 * @method Like[]    findAll()
 * @method Like[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Like::class);
    }


    public function findByExampleField(string $bid, string $uid)
    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;

//        $entityManager = $this->getEntityManager();
//
//        $query = $entityManager->createQuery(
//            'SELECT id
//            FROM `like`
//            WHERE  id_post_id = p.post
//            AND id_user_id = p.user
//            '
//        )->setParameter('user', $uid  )
//        ->setParameter('post',$bid);
//
//        // returns an array of Product objects
//        return $query->getResult();



//        $qb = $this->createQueryBuilder('p')
//            ->where('p.idPost = :post')
//            ->andWhere('p.idUser = :user')
//            ->setParameter('post', $bid)
//            ->setParameter('user', $uid);
//
////        if (!$includeUnavailableProducts) {
////            $qb->andWhere('p.available = TRUE');
////        }
//
//        $query = $qb->getQuery();
//
//        return $query->execute();



        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT id FROM `like` p
            WHERE p.id_post_id = :post
            AND WHERE p.id_user_id = :users
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['post' => $bid],['users'=> $uid]);



        return $stmt->fetchAllAssociative();
    }


    public function getIdLike(string $bid, string $uid){
//        $conn = $this->getEntityManager()->getConnection();
//
//        $sql = '
//            SELECT id FROM `like` p
//            WHERE p.id_post_id = 1
//            AND p.id_user_id = 3;
//            ';
//        $stmt = $conn->prepare($sql);
//
//
//         var_dump($stmt->fetch_all());

        $qb = $this->createQueryBuilder('p')
            ->where('p.id_post_id = 1')
            ->andWhere('p.id = 3');

//        if (!$includeUnavailableProducts) {
//            $qb->andWhere('p.available = TRUE');
//        }

        $query = $qb->getQuery();

        $query->execute();
    }


    /*
    public function findOneBySomeField($value): ?Like
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

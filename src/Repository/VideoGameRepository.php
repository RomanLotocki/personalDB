<?php

namespace App\Repository;

use App\Entity\VideoGame;
use App\Model\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<VideoGame>
 *
 * @method VideoGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoGame[]    findAll()
 * @method VideoGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoGameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private PaginatorInterface $paginatorInterface)
    {
        parent::__construct($registry, VideoGame::class);
    }

    public function save(VideoGame $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VideoGame $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAllByUser($value)
    {
        return $this->createQueryBuilder('s')
            ->where('s.user = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Return the videogames list of the current user allowing a user search filter and activating the pagination
     *
     * @param [type] $value
     * @param SearchData $searchData
     * @param integer $page
     * @return PaginationInterface
     */
    public function findAllByUserPaginated($value, SearchData $searchData, int $page): PaginationInterface
    {
        $data = $this->createQueryBuilder('s')
            ->where('s.user = :val')
            ->setParameter('val', $value);
        if (!empty($searchData->query)) {
            $data = $data
                ->andWhere('s.name LIKE :q')
                ->setParameter('q', "%{$searchData->query}%");
        }
        $data = $data
            ->orderBy('s.id', 'DESC')
            ->getQuery()
            ->getResult();

        $results = $this->paginatorInterface->paginate($data, $page, 20);

        return $results;
    }

    /**
     * Return nine last added games
     *
     * @param User $value
     * @return void
     */
    public function findNineLastByUser($value)
    {
        return $this->createQueryBuilder('p')
            ->where('p.user = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->setMaxResults(9)
            ->getResult();
    }

    /**
     * Get the older game of the collection
     *
     * @param [type] $value
     * @return void
     */
    public function findTheOlder($value)
    {
        return $this->createQueryBuilder('s')
            ->where('s.user = :val')
            ->setParameter('val', $value)
            ->orderBy('s.releaseDate')
            ->getQuery()
            ->setMaxResults(1)
            ->getResult()
        ;
    }



    //    /**
    //     * @return VideoGame[] Returns an array of VideoGame objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?VideoGame
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

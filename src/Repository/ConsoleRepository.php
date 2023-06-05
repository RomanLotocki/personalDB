<?php

namespace App\Repository;

use App\Entity\Console;
use App\Model\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Console>
 *
 * @method Console|null find($id, $lockMode = null, $lockVersion = null)
 * @method Console|null findOneBy(array $criteria, array $orderBy = null)
 * @method Console[]    findAll()
 * @method Console[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private PaginatorInterface $paginatorInterface)
    {
        parent::__construct($registry, Console::class);
    }

    public function save(Console $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Console $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Return the consoles list of the current user allowing a user search filter and activating pagination
     *
     * @param [type] $value
     * @param SearchData $searchData
     * @param integer $page
     * @return PaginationInterface
     */
    public function findAllConsolesByUser($value, SearchData $searchData, int $page): PaginationInterface
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

        $results = $this->paginatorInterface->paginate($data, $page, 10);

        return $results;
    }


}

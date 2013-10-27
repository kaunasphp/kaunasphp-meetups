<?php
namespace Repository;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{
    public function getBadComments($max = 10)
    {
        $dql = "SELECT c FROM Entity\Comment AS c WHERE c.text LIKE :filter";
        return $this->getEntityManager()->createQuery($dql)
                             ->setParameter('filter', "%bad word%")
                             ->setMaxResults($max)
                             ->getResult();
    }
}
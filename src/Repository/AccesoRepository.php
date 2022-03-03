<?php

namespace App\Repository;

use App\Entity\Acceso;
use App\Entity\Socio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AccesoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Acceso::class);
    }

    public function findSocioAccesos(int $id) : array
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT a FROM  App\\Entity\\Acceso a WHERE a.socioAccede = :socioAccede ORDER BY a.horaSalida ASC")
            ->setParameter('socioAccede', $id )
            ->getResult();
    }

}
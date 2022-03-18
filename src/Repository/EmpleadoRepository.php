<?php

namespace App\Repository;

use App\Entity\Empleado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EmpleadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Empleado::class);
    }

    public function create() : Empleado
    {
        $empleado = new Empleado();
        $this->getEntityManager()->persist($empleado);

        return $empleado;
    }

    public function save() : void
    {
        $this->getEntityManager()->flush();
    }

    public function delete(Empleado $empleado) : void
    {
        $this->getEntityManager()->remove($empleado);
        $this->save();
    }

}
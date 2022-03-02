<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccesoRepository")
 * @ORM\Table(name="acceso")
 */

class Acceso
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var ?int
     */
    private $id;

    /**
     * @ORM\Column(type="date_immutable")
     * @var ?\DateTimeImmutable
     */
    private $horaEntrada;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     * @var ?\DateTimeImmutable
     */
    private $horaSalida;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var ?int|null
     */
    private $peso;

    /**
     * @ORM\ManyToOne(targetEntity="Cinta", inversedBy="accesosCinta")
     * @ORM\JoinColumn(nullable=true)
     * @var Cinta|null
     */
    private $cintaAccede;

    /**
     * @ORM\ManyToOne(targetEntity="Empleado", inversedBy="accesosEmpleado")
     * @ORM\JoinColumn(nullable=true)
     * @var Empleado|null
     */
    private $supervisadaPor;

    /**
     * @ORM\ManyToOne(targetEntity="Socio", inversedBy="accesosSocio")
     * @ORM\JoinColumn(nullable=true)
     * @var Socio|null
     */
    private $socioAccede;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getHoraEntrada(): ?\DateTimeImmutable
    {
        return $this->horaEntrada;
    }

    /**
     * @param \DateTimeImmutable|null $horaEntrada
     * @return Acceso
     */
    public function setHoraEntrada(?\DateTimeImmutable $horaEntrada): Acceso
    {
        $this->horaEntrada = $horaEntrada;
        return $this;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getHoraSalida(): ?\DateTimeImmutable
    {
        return $this->horaSalida;
    }

    /**
     * @param \DateTimeImmutable|null $horaSalida
     * @return Acceso
     */
    public function setHoraSalida(?\DateTimeImmutable $horaSalida): Acceso
    {
        $this->horaSalida = $horaSalida;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPeso(): ?int
    {
        return $this->peso;
    }

    /**
     * @param int|null $peso
     * @return Acceso
     */
    public function setPeso(?int $peso): Acceso
    {
        $this->peso = $peso;
        return $this;
    }

    /**
     * @return Cinta|null
     */
    public function getCintaAccede(): ?Cinta
    {
        return $this->cintaAccede;
    }

    /**
     * @param Cinta|null $cintaAccede
     * @return Acceso
     */
    public function setCintaAccede(?Cinta $cintaAccede): Acceso
    {
        $this->cintaAccede = $cintaAccede;
        return $this;
    }

    /**
     * @return Empleado|null
     */
    public function getSupervisadaPor(): ?Empleado
    {
        return $this->supervisadaPor;
    }

    /**
     * @param Empleado|null $supervisadaPor
     * @return Acceso
     */
    public function setSupervisadaPor(?Empleado $supervisadaPor): Acceso
    {
        $this->supervisadaPor = $supervisadaPor;
        return $this;
    }

    /**
     * @return Socio|null
     */
    public function getSocioAccede(): ?Socio
    {
        return $this->socioAccede;
    }

    /**
     * @param Socio|null $socioAccede
     * @return Acceso
     */
    public function setSocioAccede(?Socio $socioAccede): Acceso
    {
        $this->socioAccede = $socioAccede;
        return $this;
    }

}
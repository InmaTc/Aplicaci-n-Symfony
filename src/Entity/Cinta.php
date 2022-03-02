<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CintaRepository")
 * @ORM\Table(name="cinta")
 */

class Cinta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var ?int
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @var ?int
     */
    private $numero;

    /**
     * @ORM\Column(type="integer")
     * @var ?int
     */
    private $grupoCintas;

    /**
     * @ORM\Column(type="boolean")
     * @var ?bool
     */
    private $disponible;

    /**
     * @ORM\OneToMany(targetEntity="Acceso", mappedBy="cintaAccede")
     * @var Acceso[]|Collection
     */
    private $accesosCinta;

    /**
     * @ORM\ManyToMany(targetEntity="Socio", inversedBy="cintas")
     * @var Socio[]|Collection
     */
    private $socios;

    public function __construct()
    {
        $this->accesosCinta = new ArrayCollection();
        $this->socios = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getNumero(): ?int
    {
        return $this->numero;
    }

    /**
     * @param int|null $numero
     * @return Cinta
     */
    public function setNumero(?int $numero): Cinta
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getGrupoCintas(): ?int
    {
        return $this->grupoCintas;
    }

    /**
     * @param int|null $grupoCintas
     * @return Cinta
     */
    public function setGrupoCintas(?int $grupoCintas): Cinta
    {
        $this->grupoCintas = $grupoCintas;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    /**
     * @param bool|null $disponible
     * @return Cinta
     */
    public function setDisponible(?bool $disponible): Cinta
    {
        $this->disponible = $disponible;
        return $this;
    }

    /**
     * @return Acceso[]|Collection
     */
    public function getAccesosCinta()
    {
        return $this->accesosCinta;
    }

    /**
     * @param Acceso[]|Collection $accesosCinta
     * @return Cinta
     */
    public function setAccesosCinta($accesosCinta)
    {
        $this->accesosCinta = $accesosCinta;
        return $this;
    }

    /**
     * @return Socio[]|Collection
     */
    public function getSocios()
    {
        return $this->socios;
    }

    /**
     * @param Socio[]|Collection $socios
     * @return Cinta
     */
    public function setSocios($socios)
    {
        $this->socios = $socios;
        return $this;
    }

}
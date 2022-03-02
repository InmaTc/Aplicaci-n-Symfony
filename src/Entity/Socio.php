<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocioRepository")
 * @ORM\Table(name="socio")
 */

class Socio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var ?int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var ?string
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     * @var ?string
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string")
     * @var ?string
     */
    private $dni;

    /**
     * @ORM\ManyToMany(targetEntity="Cinta", mappedBy="socios")
     * @var Cinta[]|Collection
     */
    private $cintas;

    /**
     * @ORM\OneToMany(targetEntity="Acceso", mappedBy="socioAccede")
     * @var Acceso[]|Collection
     */
    private $accesosSocio;

    public function __construct()
    {
        $this->cintas = new ArrayCollection();
        $this->accesosSocio = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string|null $nombre
     * @return Socio
     */
    public function setNombre(?string $nombre): Socio
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    /**
     * @param string|null $apellidos
     * @return Socio
     */
    public function setApellidos(?string $apellidos): Socio
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDni(): ?string
    {
        return $this->dni;
    }

    /**
     * @param string|null $dni
     * @return Socio
     */
    public function setDni(?string $dni): Socio
    {
        $this->dni = $dni;
        return $this;
    }

    /**
     * @return Cinta[]|Collection
     */
    public function getCintas()
    {
        return $this->cintas;
    }

    /**
     * @param Cinta[]|Collection $cintas
     * @return Socio
     */
    public function setCintas($cintas)
    {
        $this->cintas = $cintas;
        return $this;
    }

    /**
     * @return Acceso[]|Collection
     */
    public function getAccesosSocio()
    {
        return $this->accesosSocio;
    }

    /**
     * @param Acceso[]|Collection $accesosSocio
     * @return Socio
     */
    public function setAccesosSocio($accesosSocio)
    {
        $this->accesosSocio = $accesosSocio;
        return $this;
    }

}
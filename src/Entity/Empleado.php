<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpleadoRepository")
 * @ORM\Table(name="empleado")
 */

class Empleado
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
     * @ORM\Column(type="string")
     * @var ?string
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     * @var ?bool
     */
    private $esSupervisor;

    /**
     * @ORM\OneToMany(targetEntity="Acceso", mappedBy="supervisadaPor")
     * @var Acceso[]|Collection
     */
    private $accesosEmpleado;

    public function __construct()
    {
        $this->accesosEmpleado = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nombre . ' ' . $this->apellidos;
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
     * @return Empleado
     */
    public function setNombre(?string $nombre): Empleado
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
     * @return Empleado
     */
    public function setApellidos(?string $apellidos): Empleado
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
     * @return Empleado
     */
    public function setDni(?string $dni): Empleado
    {
        $this->dni = $dni;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Empleado
     */
    public function setEmail(?string $email): Empleado
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEsSupervisor(): ?bool
    {
        return $this->esSupervisor;
    }

    /**
     * @param bool|null $esSupervisor
     * @return Empleado
     */
    public function setEsSupervisor(?bool $esSupervisor): Empleado
    {
        $this->esSupervisor = $esSupervisor;
        return $this;
    }

    /**
     * @return Acceso[]|Collection
     */
    public function getAccesosEmpleado()
    {
        return $this->accesosEmpleado;
    }

    /**
     * @param Acceso[]|Collection $accesosEmpleado
     * @return Empleado
     */
    public function setAccesosEmpleado($accesosEmpleado)
    {
        $this->accesosEmpleado = $accesosEmpleado;
        return $this;
    }

}
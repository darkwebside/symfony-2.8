<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deudores
 *
 * @ORM\Table(name="deudores")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeudoresRepository")
 */
class Deudores
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=40)
     */
    private $nif;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="deuda", type="decimal", precision=15, scale=2)
     */
    private $deuda;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechainclusion", type="datetime")
     */
    private $fechaInclusion;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nif
     *
     * @param string $nif
     *
     * @return Deudores
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Deudores
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set deuda
     *
     * @param string $deuda
     *
     * @return Deudores
     */
    public function setDeuda($deuda)
    {
        $this->deuda = $deuda;

        return $this;
    }

    /**
     * Get deuda
     *
     * @return string
     */
    public function getDeuda()
    {
        return $this->deuda;
    }

    /**
     * Set fechaInclusion
     *
     * @param \DateTime $fechaInclusion
     *
     * @return Deudores
     */
    public function setFechaInclusion($fechaInclusion)
    {
        $this->fechaInclusion = $fechaInclusion;

        return $this;
    }

    /**
     * Get fechaInclusion
     *
     * @return \DateTime
     */
    public function getFechaInclusion()
    {
        return $this->fechaInclusion;
    }
}


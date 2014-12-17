<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Instrument
 *
 * @ORM\Table(name="Instrument", uniqueConstraints={@ORM\UniqueConstraint(name="IX_Instrument", columns={"Nom_Instrument"})})
 * @ORM\Entity(repositoryClass="ProjetWeb\ClassiqueBundle\Repository\Instrument")
 */
class Instrument
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Instrument", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeInstrument;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Instrument", type="string", length=50, nullable=false)
     */
    private $nomInstrument;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="blob", nullable=true)
     */
    private $image;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="Instrumentation", mappedBy="codeInstrument")
     *
     */
    private $instrumentations;


    public function __construct() {
        $this->instrumentations = new ArrayCollection();
    }

    /**
     * Get codeInstrument
     *
     * @return integer 
     */
    public function getCodeInstrument()
    {
        return $this->codeInstrument;
    }

    /**
     * Set nomInstrument
     *
     * @param string $nomInstrument
     * @return Instrument
     */
    public function setNomInstrument($nomInstrument)
    {
        $this->nomInstrument = $nomInstrument;

        return $this;
    }

    /**
     * Get nomInstrument
     *
     * @return string 
     */
    public function getNomInstrument()
    {
        return $this->nomInstrument;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Instrument
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return array
     */
    public function getInstrumentations()
    {
        return $this->instrumentations;
    }

    /**
     * @param array $instrumentations
     */
    public function setInstrumentations( $instrumentations )
    {
        $this->instrumentations = $instrumentations;

        return $this;
    }
}

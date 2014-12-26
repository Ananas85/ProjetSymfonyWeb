<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Composition
 *
 * @ORM\Table(name="Composition")
 * @ORM\Entity
 */
class Composition
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Composition", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeComposition;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre_Composition", type="string", length=0, nullable=false)
     */
    private $titreComposition;

    /**
     * @var integer
     *
     * @ORM\Column(name="Année", type="integer", nullable=true)
     */
    private $année;

    /**
     * @var string
     *
     * @ORM\Column(name="Composante_Composition", type="string", length=0, nullable=true)
     */
    private $composanteComposition;


    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="CompositionOeuvre", mappedBy="codeComposition")
     */
    private $compositionoeuvres;


    public function __construct()
    {
        $this->compositionoeuvres = new ArrayCollection();
    }


    /**
     * Get codeComposition
     *
     * @return integer
     */
    public function getCodeComposition()
    {
        return $this->codeComposition;
    }

    /**
     * Set titreComposition
     *
     * @param string $titreComposition
     *
     * @return Composition
     */
    public function setTitreComposition($titreComposition)
    {
        $this->titreComposition = $titreComposition;

        return $this;
    }

    /**
     * Get titreComposition
     *
     * @return string
     */
    public function getTitreComposition()
    {
        return $this->titreComposition;
    }

    /**
     * Set année
     *
     * @param integer $année
     *
     * @return Composition
     */
    public function setAnnee($année)
    {
        $this->année = $année;

        return $this;
    }

    /**
     * Get année
     *
     * @return integer
     */
    public function getAnnee()
    {
        return $this->année;
    }

    /**
     * Set composanteComposition
     *
     * @param string $composanteComposition
     *
     * @return Composition
     */
    public function setComposanteComposition($composanteComposition)
    {
        $this->composanteComposition = $composanteComposition;

        return $this;
    }

    /**
     * Get composanteComposition
     *
     * @return string
     */
    public function getComposanteComposition()
    {
        return $this->composanteComposition;
    }

    /**
     * @return array
     */
    public function getCompositionoeuvres()
    {
        return $this->compositionoeuvres;
    }

    /**
     * @param array $compositionoeuvres
     */
    public function setCompositionoeuvres($compositionoeuvres)
    {
        $this->compositionoeuvres = $compositionoeuvres;

        return $this;
    }
}

<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

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
    private $ann�e;

    /**
     * @var string
     *
     * @ORM\Column(name="Composante_Composition", type="string", length=0, nullable=true)
     */
    private $composanteComposition;



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
     * Set ann�e
     *
     * @param integer $ann�e
     * @return Composition
     */
    public function setAnn�e($ann�e)
    {
        $this->ann�e = $ann�e;

        return $this;
    }

    /**
     * Get ann�e
     *
     * @return integer 
     */
    public function getAnn�e()
    {
        return $this->ann�e;
    }

    /**
     * Set composanteComposition
     *
     * @param string $composanteComposition
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
}

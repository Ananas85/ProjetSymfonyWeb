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
     * @ORM\Column(name="AnnÃ©e", type="integer", nullable=true)
     */
    private $annã©e;

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
     * Set annã©e
     *
     * @param integer $annã©e
     * @return Composition
     */
    public function setAnnã©e($annã©e)
    {
        $this->annã©e = $annã©e;

        return $this;
    }

    /**
     * Get annã©e
     *
     * @return integer 
     */
    public function getAnnã©e()
    {
        return $this->annã©e;
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

<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oeuvre
 *
 * @ORM\Table(name="Oeuvre", indexes={@ORM\Index(name="IDX_32522BC898F61075", columns={"Code_Type"})})
 * @ORM\Entity
 */
class Oeuvre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Oeuvre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre_Oeuvre", type="string", length=200, nullable=false)
     */
    private $titreOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="Sous_Titre", type="string", length=200, nullable=true)
     */
    private $sousTitre;

    /**
     * @var string
     *
     * @ORM\Column(name="TonalitÃ©", type="string", length=20, nullable=true)
     */
    private $tonalitã©;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnnÃ©e", type="integer", nullable=true)
     */
    private $annã©e;

    /**
     * @var string
     *
     * @ORM\Column(name="Opus", type="string", length=20, nullable=true)
     */
    private $opus;

    /**
     * @var integer
     *
     * @ORM\Column(name="NumÃ©ro_Opus", type="integer", nullable=true)
     */
    private $numã©roOpus;

    /**
     * @var \TypeMorceaux
     *
     * @ORM\ManyToOne(targetEntity="TypeMorceaux")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Type", referencedColumnName="Code_Type")
     * })
     */
    private $codeType;



    /**
     * Get codeOeuvre
     *
     * @return integer 
     */
    public function getCodeOeuvre()
    {
        return $this->codeOeuvre;
    }

    /**
     * Set titreOeuvre
     *
     * @param string $titreOeuvre
     * @return Oeuvre
     */
    public function setTitreOeuvre($titreOeuvre)
    {
        $this->titreOeuvre = $titreOeuvre;

        return $this;
    }

    /**
     * Get titreOeuvre
     *
     * @return string 
     */
    public function getTitreOeuvre()
    {
        return $this->titreOeuvre;
    }

    /**
     * Set sousTitre
     *
     * @param string $sousTitre
     * @return Oeuvre
     */
    public function setSousTitre($sousTitre)
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    /**
     * Get sousTitre
     *
     * @return string 
     */
    public function getSousTitre()
    {
        return $this->sousTitre;
    }

    /**
     * Set tonalitã©
     *
     * @param string $tonalitã©
     * @return Oeuvre
     */
    public function setTonalitã©($tonalitã©)
    {
        $this->tonalitã© = $tonalitã©;

        return $this;
    }

    /**
     * Get tonalitã©
     *
     * @return string 
     */
    public function getTonalitã©()
    {
        return $this->tonalitã©;
    }

    /**
     * Set annã©e
     *
     * @param integer $annã©e
     * @return Oeuvre
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
     * Set opus
     *
     * @param string $opus
     * @return Oeuvre
     */
    public function setOpus($opus)
    {
        $this->opus = $opus;

        return $this;
    }

    /**
     * Get opus
     *
     * @return string 
     */
    public function getOpus()
    {
        return $this->opus;
    }

    /**
     * Set numã©roOpus
     *
     * @param integer $numã©roOpus
     * @return Oeuvre
     */
    public function setNumã©roOpus($numã©roOpus)
    {
        $this->numã©roOpus = $numã©roOpus;

        return $this;
    }

    /**
     * Get numã©roOpus
     *
     * @return integer 
     */
    public function getNumã©roOpus()
    {
        return $this->numã©roOpus;
    }

    /**
     * Set codeType
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\TypeMorceaux $codeType
     * @return Oeuvre
     */
    public function setCodeType(\ProjetWeb\ClassiqueBundle\Entity\TypeMorceaux $codeType = null)
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * Get codeType
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\TypeMorceaux 
     */
    public function getCodeType()
    {
        return $this->codeType;
    }
}

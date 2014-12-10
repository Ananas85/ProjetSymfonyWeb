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
     * @ORM\Column(name="Tonalité", type="string", length=20, nullable=true)
     */
    private $tonalit�;

    /**
     * @var integer
     *
     * @ORM\Column(name="Année", type="integer", nullable=true)
     */
    private $ann�e;

    /**
     * @var string
     *
     * @ORM\Column(name="Opus", type="string", length=20, nullable=true)
     */
    private $opus;

    /**
     * @var integer
     *
     * @ORM\Column(name="Numéro_Opus", type="integer", nullable=true)
     */
    private $num�roOpus;

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
     * Set tonalit�
     *
     * @param string $tonalit�
     * @return Oeuvre
     */
    public function setTonalit�($tonalit�)
    {
        $this->tonalit� = $tonalit�;

        return $this;
    }

    /**
     * Get tonalit�
     *
     * @return string 
     */
    public function getTonalit�()
    {
        return $this->tonalit�;
    }

    /**
     * Set ann�e
     *
     * @param integer $ann�e
     * @return Oeuvre
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
     * Set num�roOpus
     *
     * @param integer $num�roOpus
     * @return Oeuvre
     */
    public function setNum�roOpus($num�roOpus)
    {
        $this->num�roOpus = $num�roOpus;

        return $this;
    }

    /**
     * Get num�roOpus
     *
     * @return integer 
     */
    public function getNum�roOpus()
    {
        return $this->num�roOpus;
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

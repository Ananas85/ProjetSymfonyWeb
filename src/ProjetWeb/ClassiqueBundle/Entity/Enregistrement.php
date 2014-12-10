<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enregistrement
 *
 * @ORM\Table(name="Enregistrement", indexes={@ORM\Index(name="IDX_CC3BD8F7D49D5E5D", columns={"Code_Composition"})})
 * @ORM\Entity
 */
class Enregistrement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Morceau", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeMorceau;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=0, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_de_Fichier", type="string", length=0, nullable=false)
     */
    private $nomDeFichier;

    /**
     * @var string
     *
     * @ORM\Column(name="Durée", type="string", length=10, nullable=true)
     */
    private $dur�e;

    /**
     * @var integer
     *
     * @ORM\Column(name="Durée_Seconde", type="integer", nullable=true)
     */
    private $dur�eSeconde;

    /**
     * @var integer
     *
     * @ORM\Column(name="Prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="Extrait", type="blob", nullable=true)
     */
    private $extrait;

    /**
     * @var \Composition
     *
     * @ORM\ManyToOne(targetEntity="Composition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Composition", referencedColumnName="Code_Composition")
     * })
     */
    private $codeComposition;



    /**
     * Get codeMorceau
     *
     * @return integer 
     */
    public function getCodeMorceau()
    {
        return $this->codeMorceau;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Enregistrement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set nomDeFichier
     *
     * @param string $nomDeFichier
     * @return Enregistrement
     */
    public function setNomDeFichier($nomDeFichier)
    {
        $this->nomDeFichier = $nomDeFichier;

        return $this;
    }

    /**
     * Get nomDeFichier
     *
     * @return string 
     */
    public function getNomDeFichier()
    {
        return $this->nomDeFichier;
    }

    /**
     * Set dur�e
     *
     * @param string $dur�e
     * @return Enregistrement
     */
    public function setDur�e($dur�e)
    {
        $this->dur�e = $dur�e;

        return $this;
    }

    /**
     * Get dur�e
     *
     * @return string 
     */
    public function getDur�e()
    {
        return $this->dur�e;
    }

    /**
     * Set dur�eSeconde
     *
     * @param integer $dur�eSeconde
     * @return Enregistrement
     */
    public function setDur�eSeconde($dur�eSeconde)
    {
        $this->dur�eSeconde = $dur�eSeconde;

        return $this;
    }

    /**
     * Get dur�eSeconde
     *
     * @return integer 
     */
    public function getDur�eSeconde()
    {
        return $this->dur�eSeconde;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return Enregistrement
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set extrait
     *
     * @param string $extrait
     * @return Enregistrement
     */
    public function setExtrait($extrait)
    {
        $this->extrait = $extrait;

        return $this;
    }

    /**
     * Get extrait
     *
     * @return string 
     */
    public function getExtrait()
    {
        return $this->extrait;
    }

    /**
     * Set codeComposition
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Composition $codeComposition
     * @return Enregistrement
     */
    public function setCodeComposition(\ProjetWeb\ClassiqueBundle\Entity\Composition $codeComposition = null)
    {
        $this->codeComposition = $codeComposition;

        return $this;
    }

    /**
     * Get codeComposition
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Composition 
     */
    public function getCodeComposition()
    {
        return $this->codeComposition;
    }
}

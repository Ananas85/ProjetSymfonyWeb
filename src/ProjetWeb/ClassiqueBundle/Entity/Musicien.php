<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Musicien
 *
 * @ORM\Table(name="Musicien", indexes={@ORM\Index(name="IDX_AC6BE67520B77BF2", columns={"Code_Pays"}), @ORM\Index(name="IDX_AC6BE675E1990660", columns={"Code_Genre"}), @ORM\Index(name="IDX_AC6BE675D389A975", columns={"Code_Instrument"})})
 * @ORM\Entity
 */
class Musicien
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Musicien", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeMusicien;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Musicien", type="string", length=200, nullable=false)
     */
    private $nomMusicien;

    /**
     * @var string
     *
     * @ORM\Column(name="PrÃ©nom_Musicien", type="string", length=50, nullable=true)
     */
    private $prã©nomMusicien;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnnÃ©e_Naissance", type="integer", nullable=true)
     */
    private $annã©eNaissance;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnnÃ©e_Mort", type="integer", nullable=true)
     */
    private $annã©eMort;

    /**
     * @var string
     *
     * @ORM\Column(name="Photo", type="blob", nullable=true)
     */
    private $photo;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Pays", referencedColumnName="Code_Pays")
     * })
     */
    private $codePays;

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Genre", referencedColumnName="Code_Genre")
     * })
     */
    private $codeGenre;

    /**
     * @var \Instrument
     *
     * @ORM\ManyToOne(targetEntity="Instrument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Instrument", referencedColumnName="Code_Instrument")
     * })
     */
    private $codeInstrument;



    /**
     * Get codeMusicien
     *
     * @return integer 
     */
    public function getCodeMusicien()
    {
        return $this->codeMusicien;
    }

    /**
     * Set nomMusicien
     *
     * @param string $nomMusicien
     * @return Musicien
     */
    public function setNomMusicien($nomMusicien)
    {
        $this->nomMusicien = $nomMusicien;

        return $this;
    }

    /**
     * Get nomMusicien
     *
     * @return string 
     */
    public function getNomMusicien()
    {
        return $this->nomMusicien;
    }

    /**
     * Set prã©nomMusicien
     *
     * @param string $prã©nomMusicien
     * @return Musicien
     */
    public function setPrã©nomMusicien($prã©nomMusicien)
    {
        $this->prã©nomMusicien = $prã©nomMusicien;

        return $this;
    }

    /**
     * Get prã©nomMusicien
     *
     * @return string 
     */
    public function getPrã©nomMusicien()
    {
        return $this->prã©nomMusicien;
    }

    /**
     * Set annã©eNaissance
     *
     * @param integer $annã©eNaissance
     * @return Musicien
     */
    public function setAnnã©eNaissance($annã©eNaissance)
    {
        $this->annã©eNaissance = $annã©eNaissance;

        return $this;
    }

    /**
     * Get annã©eNaissance
     *
     * @return integer 
     */
    public function getAnnã©eNaissance()
    {
        return $this->annã©eNaissance;
    }

    /**
     * Set annã©eMort
     *
     * @param integer $annã©eMort
     * @return Musicien
     */
    public function setAnnã©eMort($annã©eMort)
    {
        $this->annã©eMort = $annã©eMort;

        return $this;
    }

    /**
     * Get annã©eMort
     *
     * @return integer 
     */
    public function getAnnã©eMort()
    {
        return $this->annã©eMort;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Musicien
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set codePays
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Pays $codePays
     * @return Musicien
     */
    public function setCodePays(\ProjetWeb\ClassiqueBundle\Entity\Pays $codePays = null)
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get codePays
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Pays 
     */
    public function getCodePays()
    {
        return $this->codePays;
    }

    /**
     * Set codeGenre
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Genre $codeGenre
     * @return Musicien
     */
    public function setCodeGenre(\ProjetWeb\ClassiqueBundle\Entity\Genre $codeGenre = null)
    {
        $this->codeGenre = $codeGenre;

        return $this;
    }

    /**
     * Get codeGenre
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Genre 
     */
    public function getCodeGenre()
    {
        return $this->codeGenre;
    }

    /**
     * Set codeInstrument
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Instrument $codeInstrument
     * @return Musicien
     */
    public function setCodeInstrument(\ProjetWeb\ClassiqueBundle\Entity\Instrument $codeInstrument = null)
    {
        $this->codeInstrument = $codeInstrument;

        return $this;
    }

    /**
     * Get codeInstrument
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Instrument 
     */
    public function getCodeInstrument()
    {
        return $this->codeInstrument;
    }
}

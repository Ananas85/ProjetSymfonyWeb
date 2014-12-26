<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Musicien
 *
 * @ORM\Table(name="Musicien", indexes={@ORM\Index(name="IDX_AC6BE67520B77BF2", columns={"Code_Pays"}), @ORM\Index(name="IDX_AC6BE675E1990660", columns={"Code_Genre"}), @ORM\Index(name="IDX_AC6BE675D389A975", columns={"Code_Instrument"})})
 * @ORM\Entity(repositoryClass="ProjetWeb\ClassiqueBundle\Repository\Musicien")
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
     * @ORM\Column(name="Prénom_Musicien", type="string", length=50, nullable=true)
     */
    private $prénomMusicien;

    /**
     * @var integer
     *
     * @ORM\Column(name="Année_Naissance", type="integer", nullable=true)
     */
    private $anneeNaissance;

    /**
     * @var integer
     *
     * @ORM\Column(name="Année_Mort", type="integer", nullable=true)
     */
    private $anneeMort;

    /**
     * @var string
     *
     * @ORM\Column(name="Photo", type="blob", nullable=true)
     */
    private $photo;

    /**
     * @var Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Pays", referencedColumnName="Code_Pays")
     * })
     */
    private $codePays;

    /**
     * @var Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="musiciens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Genre", referencedColumnName="Code_Genre")
     * })
     */
    private $codeGenre;

    /**
     * @var Instrument
     *
     * @ORM\ManyToOne(targetEntity="Instrument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Instrument", referencedColumnName="Code_Instrument")
     * })
     */
    private $codeInstrument;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Composer", mappedBy="codeMusicien")
     */
    private $composers;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="Interpreter", mappedBy="codeMusicien")
     *
     */
    private $interpreters;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="Direction", mappedBy="codeMusicien")
     *
     */
    private $directions;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->composers    = new ArrayCollection();
        $this->interpreters = new ArrayCollection();
        $this->directions   = new ArrayCollection();

    }

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
     *
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
     * Set prénomMusicien
     *
     * @param string $prénomMusicien
     *
     * @return Musicien
     */
    public function setPrenomMusicien($prénomMusicien)
    {
        $this->prénomMusicien = $prénomMusicien;

        return $this;
    }

    /**
     * Get prénomMusicien
     *
     * @return string
     */
    public function getPrenomMusicien()
    {
        return $this->prénomMusicien;
    }

    /**
     * Set annéeNaissance
     *
     * @param integer $annéeNaissance
     *
     * @return Musicien
     */
    public function setAnneeNaissance($annéeNaissance)
    {
        $this->anneeNaissance = $annéeNaissance;

        return $this;
    }

    /**
     * Get annéeNaissance
     *
     * @return integer
     */
    public function getAnneeNaissance()
    {
        return $this->anneeNaissance;
    }

    /**
     * Set annéeMort
     *
     * @param integer $annéeMort
     *
     * @return Musicien
     */
    public function setAnneeMort($annéeMort)
    {
        $this->anneeMort = $annéeMort;

        return $this;
    }

    /**
     * Get annéeMort
     *
     * @return integer
     */
    public function getAnneeMort()
    {
        return $this->anneeMort;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
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
     * @param Pays $codePays
     *
     * @return Musicien
     */
    public function setCodePays(Pays $codePays = null)
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get codePays
     *
     * @return Pays
     */
    public function getCodePays()
    {
        return $this->codePays;
    }

    /**
     * Set codeGenre
     *
     * @param Genre $codeGenre
     *
     * @return Musicien
     */
    public function setCodeGenre(Genre $codeGenre = null)
    {
        $this->codeGenre = $codeGenre;

        return $this;
    }

    /**
     * Get codeGenre
     *
     * @return Genre
     */
    public function getCodeGenre()
    {
        return $this->codeGenre;
    }

    /**
     * Set codeInstrument
     *
     * @param Instrument $codeInstrument
     *
     * @return Musicien
     */
    public function setCodeInstrument(Instrument $codeInstrument = null)
    {
        $this->codeInstrument = $codeInstrument;

        return $this;
    }

    /**
     * Get codeInstrument
     *
     * @return Instrument
     */
    public function getCodeInstrument()
    {
        return $this->codeInstrument;
    }

    /**
     * @return array
     */
    public function getComposers()
    {
        return $this->composers;
    }

    /**
     * @param array $composers
     */
    public function setComposers($composers)
    {
        $this->composers = $composers;

        return $this;
    }

    /**
     * @return array
     */
    public function getInterpreters()
    {
        return $this->interpreters;
    }

    /**
     * @param array $interpreters
     */
    public function setInterpreters($interpreters)
    {
        $this->interpreters = $interpreters;

        return $this;
    }

    /**
     * @return array
     */
    public function getDirections()
    {
        return $this->directions;
    }

    /**
     * @param array $directions
     */
    public function setDirections($directions)
    {
        $this->directions = $directions;

        return $this;
    }
}

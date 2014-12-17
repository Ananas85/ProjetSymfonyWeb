<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Genre
 *
 * @ORM\Table(name="Genre")
 * @ORM\Entity(repositoryClass="ProjetWeb\ClassiqueBundle\Repository\Genre")
 */
class Genre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Genre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeGenre;

    /**
     * @var string
     *
     * @ORM\Column(name="Libellé_Abrégé", type="string", length=30, nullable=false)
     */
    private $libelleAbrege;


    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Musicien", mappedBy="codeGenre")
     */
    private $musiciens;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Album", mappedBy="codeGenre")
     */
    private $albums;


    public function __construct() {
        $this->musiciens = new ArrayCollection();
        $this->albums = new ArrayCollection();
    }

    /**
     * Get codeGenre
     *
     * @return integer
     */
    public function getCodeGenre()
    {
        return $this->codeGenre;
    }

    /**
     * Set libelléAbrégé
     *
     * @param string $libelléAbrégé
     * @return Genre
     */
    public function setLibelleAbrege($libelléAbrégé)
    {
        $this->libelleAbrege = $libelléAbrégé;

        return $this;
    }

    /**
     * Get libelléAbrégé
     *
     * @return string
     */
    public function getLibelleAbrege()
    {
        return $this->libelleAbrege;
    }

    /**
     * @return array
     */
    public function getMusiciens()
    {
        return $this->musiciens;
    }

    /**
     * @param array $musiciens
     */
    public function setMusiciens( $musiciens )
    {
        $this->musiciens = $musiciens;
        return $this;
    }

    /**
     * @return array
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * @param array $albums
     */
    public function setAlbums( $albums )
    {
        $this->albums = $albums;

        return $this;
    }

}

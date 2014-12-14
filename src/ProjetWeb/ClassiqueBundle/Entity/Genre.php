<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Genre
 *
 * @ORM\Table(name="Genre")
 * @ORM\Entity
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
    private $libelléAbrégé;


    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Musicien", mappedBy="codeGenre")
     */
    private $musiciens;


    public function __construct() {
        $this->musiciens = new ArrayCollection();
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
    public function setLibelléAbrégé($libelléAbrégé)
    {
        $this->libelléAbrégé = $libelléAbrégé;

        return $this;
    }

    /**
     * Get libelléAbrégé
     *
     * @return string
     */
    public function getLibelléAbrégé()
    {
        return $this->libelléAbrégé;
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


}

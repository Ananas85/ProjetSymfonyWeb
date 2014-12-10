<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="LibellÃ©_AbrÃ©gÃ©", type="string", length=30, nullable=false)
     */
    private $libellã©Abrã©gã©;



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
     * Set libellã©Abrã©gã©
     *
     * @param string $libellã©Abrã©gã©
     * @return Genre
     */
    public function setLibellã©Abrã©gã©($libellã©Abrã©gã©)
    {
        $this->libellã©Abrã©gã© = $libellã©Abrã©gã©;

        return $this;
    }

    /**
     * Get libellã©Abrã©gã©
     *
     * @return string 
     */
    public function getLibellã©Abrã©gã©()
    {
        return $this->libellã©Abrã©gã©;
    }
}

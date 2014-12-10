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
     * @ORM\Column(name="Libellé_Abrégé", type="string", length=30, nullable=false)
     */
    private $libell�Abr�g�;



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
     * Set libell�Abr�g�
     *
     * @param string $libell�Abr�g�
     * @return Genre
     */
    public function setLibell�Abr�g�($libell�Abr�g�)
    {
        $this->libell�Abr�g� = $libell�Abr�g�;

        return $this;
    }

    /**
     * Get libell�Abr�g�
     *
     * @return string 
     */
    public function getLibell�Abr�g�()
    {
        return $this->libell�Abr�g�;
    }
}

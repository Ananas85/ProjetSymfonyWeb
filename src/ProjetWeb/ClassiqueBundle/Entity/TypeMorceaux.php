<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeMorceaux
 *
 * @ORM\Table(name="Type_Morceaux")
 * @ORM\Entity
 */
class TypeMorceaux
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Type", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeType;

    /**
     * @var string
     *
     * @ORM\Column(name="Libellé_Type", type="string", length=20, nullable=false)
     */
    private $libell�Type;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=0, nullable=true)
     */
    private $description;



    /**
     * Get codeType
     *
     * @return integer 
     */
    public function getCodeType()
    {
        return $this->codeType;
    }

    /**
     * Set libell�Type
     *
     * @param string $libell�Type
     * @return TypeMorceaux
     */
    public function setLibell�Type($libell�Type)
    {
        $this->libell�Type = $libell�Type;

        return $this;
    }

    /**
     * Get libell�Type
     *
     * @return string 
     */
    public function getLibell�Type()
    {
        return $this->libell�Type;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return TypeMorceaux
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}

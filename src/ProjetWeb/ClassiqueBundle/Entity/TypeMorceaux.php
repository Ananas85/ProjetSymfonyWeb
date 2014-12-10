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
     * @ORM\Column(name="LibellÃ©_Type", type="string", length=20, nullable=false)
     */
    private $libellã©Type;

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
     * Set libellã©Type
     *
     * @param string $libellã©Type
     * @return TypeMorceaux
     */
    public function setLibellã©Type($libellã©Type)
    {
        $this->libellã©Type = $libellã©Type;

        return $this;
    }

    /**
     * Get libellã©Type
     *
     * @return string 
     */
    public function getLibellã©Type()
    {
        return $this->libellã©Type;
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

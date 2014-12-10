<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achat
 *
 * @ORM\Table(name="Achat", indexes={@ORM\Index(name="IDX_E768AB52A1866919", columns={"Code_Enregistrement"}), @ORM\Index(name="IDX_E768AB52D7B589C1", columns={"Code_AbonnÃ©"})})
 * @ORM\Entity
 */
class Achat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Achat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAchat;

    /**
     * @var \Enregistrement
     *
     * @ORM\ManyToOne(targetEntity="Enregistrement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Enregistrement", referencedColumnName="Code_Morceau")
     * })
     */
    private $codeEnregistrement;

    /**
     * @var \Abonnã©
     *
     * @ORM\ManyToOne(targetEntity="Abonnã©")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_AbonnÃ©", referencedColumnName="Code_AbonnÃ©")
     * })
     */
    private $codeAbonnã©;



    /**
     * Get codeAchat
     *
     * @return integer 
     */
    public function getCodeAchat()
    {
        return $this->codeAchat;
    }

    /**
     * Set codeEnregistrement
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Enregistrement $codeEnregistrement
     * @return Achat
     */
    public function setCodeEnregistrement(\ProjetWeb\ClassiqueBundle\Entity\Enregistrement $codeEnregistrement = null)
    {
        $this->codeEnregistrement = $codeEnregistrement;

        return $this;
    }

    /**
     * Get codeEnregistrement
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Enregistrement 
     */
    public function getCodeEnregistrement()
    {
        return $this->codeEnregistrement;
    }

    /**
     * Set codeAbonnã©
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Abonnã© $codeAbonnã©
     * @return Achat
     */
    public function setCodeAbonnã©(\ProjetWeb\ClassiqueBundle\Entity\Abonnã© $codeAbonnã© = null)
    {
        $this->codeAbonnã© = $codeAbonnã©;

        return $this;
    }

    /**
     * Get codeAbonnã©
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Abonnã© 
     */
    public function getCodeAbonnã©()
    {
        return $this->codeAbonnã©;
    }
}

<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achat
 *
 * @ORM\Table(name="Achat", indexes={@ORM\Index(name="IDX_E768AB52A1866919", columns={"Code_Enregistrement"}), @ORM\Index(name="IDX_E768AB52D7B589C1", columns={"Code_AbonnĂ©"})})
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
     * @var \Abonnă©
     *
     * @ORM\ManyToOne(targetEntity="Abonnă©")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_AbonnĂ©", referencedColumnName="Code_AbonnĂ©")
     * })
     */
    private $codeAbonnă©;



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
     * Set codeAbonnă©
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Abonnă© $codeAbonnă©
     * @return Achat
     */
    public function setCodeAbonnă©(\ProjetWeb\ClassiqueBundle\Entity\Abonnă© $codeAbonnă© = null)
    {
        $this->codeAbonnă© = $codeAbonnă©;

        return $this;
    }

    /**
     * Get codeAbonnă©
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Abonnă© 
     */
    public function getCodeAbonnă©()
    {
        return $this->codeAbonnă©;
    }
}

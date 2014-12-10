<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disque
 *
 * @ORM\Table(name="Disque", indexes={@ORM\Index(name="IDX_F200E9945B515BDB", columns={"Code_Album"})})
 * @ORM\Entity
 */
class Disque
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Disque", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeDisque;

    /**
     * @var string
     *
     * @ORM\Column(name="RÃ©fÃ©rence_Album", type="string", length=200, nullable=false)
     */
    private $rã©fã©renceAlbum;

    /**
     * @var string
     *
     * @ORM\Column(name="RÃ©fÃ©rence_Disque", type="string", length=10, nullable=true)
     */
    private $rã©fã©renceDisque;

    /**
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Album", referencedColumnName="Code_Album")
     * })
     */
    private $codeAlbum;



    /**
     * Get codeDisque
     *
     * @return integer 
     */
    public function getCodeDisque()
    {
        return $this->codeDisque;
    }

    /**
     * Set rã©fã©renceAlbum
     *
     * @param string $rã©fã©renceAlbum
     * @return Disque
     */
    public function setRã©fã©renceAlbum($rã©fã©renceAlbum)
    {
        $this->rã©fã©renceAlbum = $rã©fã©renceAlbum;

        return $this;
    }

    /**
     * Get rã©fã©renceAlbum
     *
     * @return string 
     */
    public function getRã©fã©renceAlbum()
    {
        return $this->rã©fã©renceAlbum;
    }

    /**
     * Set rã©fã©renceDisque
     *
     * @param string $rã©fã©renceDisque
     * @return Disque
     */
    public function setRã©fã©renceDisque($rã©fã©renceDisque)
    {
        $this->rã©fã©renceDisque = $rã©fã©renceDisque;

        return $this;
    }

    /**
     * Get rã©fã©renceDisque
     *
     * @return string 
     */
    public function getRã©fã©renceDisque()
    {
        return $this->rã©fã©renceDisque;
    }

    /**
     * Set codeAlbum
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Album $codeAlbum
     * @return Disque
     */
    public function setCodeAlbum(\ProjetWeb\ClassiqueBundle\Entity\Album $codeAlbum = null)
    {
        $this->codeAlbum = $codeAlbum;

        return $this;
    }

    /**
     * Get codeAlbum
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Album 
     */
    public function getCodeAlbum()
    {
        return $this->codeAlbum;
    }
}

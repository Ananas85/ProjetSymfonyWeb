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
     * @ORM\Column(name="Référence_Album", type="string", length=200, nullable=false)
     */
    private $r�f�renceAlbum;

    /**
     * @var string
     *
     * @ORM\Column(name="Référence_Disque", type="string", length=10, nullable=true)
     */
    private $r�f�renceDisque;

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
     * Set r�f�renceAlbum
     *
     * @param string $r�f�renceAlbum
     * @return Disque
     */
    public function setR�f�renceAlbum($r�f�renceAlbum)
    {
        $this->r�f�renceAlbum = $r�f�renceAlbum;

        return $this;
    }

    /**
     * Get r�f�renceAlbum
     *
     * @return string 
     */
    public function getR�f�renceAlbum()
    {
        return $this->r�f�renceAlbum;
    }

    /**
     * Set r�f�renceDisque
     *
     * @param string $r�f�renceDisque
     * @return Disque
     */
    public function setR�f�renceDisque($r�f�renceDisque)
    {
        $this->r�f�renceDisque = $r�f�renceDisque;

        return $this;
    }

    /**
     * Get r�f�renceDisque
     *
     * @return string 
     */
    public function getR�f�renceDisque()
    {
        return $this->r�f�renceDisque;
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

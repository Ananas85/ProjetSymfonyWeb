<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="Album", indexes={@ORM\Index(name="IDX_F8594147E1990660", columns={"Code_Genre"}), @ORM\Index(name="IDX_F8594147EA8CE117", columns={"Code_Editeur"})})
 * @ORM\Entity
 */
class Album
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Album", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAlbum;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre_Album", type="string", length=400, nullable=false)
     */
    private $titreAlbum;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnnÃ©e_Album", type="integer", nullable=true)
     */
    private $annã©eAlbum;

    /**
     * @var string
     *
     * @ORM\Column(name="Pochette", type="blob", nullable=true)
     */
    private $pochette;

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Genre", referencedColumnName="Code_Genre")
     * })
     */
    private $codeGenre;

    /**
     * @var \Editeur
     *
     * @ORM\ManyToOne(targetEntity="Editeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Editeur", referencedColumnName="Code_Editeur")
     * })
     */
    private $codeEditeur;



    /**
     * Get codeAlbum
     *
     * @return integer 
     */
    public function getCodeAlbum()
    {
        return $this->codeAlbum;
    }

    /**
     * Set titreAlbum
     *
     * @param string $titreAlbum
     * @return Album
     */
    public function setTitreAlbum($titreAlbum)
    {
        $this->titreAlbum = $titreAlbum;

        return $this;
    }

    /**
     * Get titreAlbum
     *
     * @return string 
     */
    public function getTitreAlbum()
    {
        return $this->titreAlbum;
    }

    /**
     * Set annã©eAlbum
     *
     * @param integer $annã©eAlbum
     * @return Album
     */
    public function setAnnã©eAlbum($annã©eAlbum)
    {
        $this->annã©eAlbum = $annã©eAlbum;

        return $this;
    }

    /**
     * Get annã©eAlbum
     *
     * @return integer 
     */
    public function getAnnã©eAlbum()
    {
        return $this->annã©eAlbum;
    }

    /**
     * Set pochette
     *
     * @param string $pochette
     * @return Album
     */
    public function setPochette($pochette)
    {
        $this->pochette = $pochette;

        return $this;
    }

    /**
     * Get pochette
     *
     * @return string 
     */
    public function getPochette()
    {
        return $this->pochette;
    }

    /**
     * Set codeGenre
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Genre $codeGenre
     * @return Album
     */
    public function setCodeGenre(\ProjetWeb\ClassiqueBundle\Entity\Genre $codeGenre = null)
    {
        $this->codeGenre = $codeGenre;

        return $this;
    }

    /**
     * Get codeGenre
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Genre 
     */
    public function getCodeGenre()
    {
        return $this->codeGenre;
    }

    /**
     * Set codeEditeur
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Editeur $codeEditeur
     * @return Album
     */
    public function setCodeEditeur(\ProjetWeb\ClassiqueBundle\Entity\Editeur $codeEditeur = null)
    {
        $this->codeEditeur = $codeEditeur;

        return $this;
    }

    /**
     * Get codeEditeur
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Editeur 
     */
    public function getCodeEditeur()
    {
        return $this->codeEditeur;
    }
}

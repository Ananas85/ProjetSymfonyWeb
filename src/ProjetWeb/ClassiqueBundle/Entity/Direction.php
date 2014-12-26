<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Direction
 *
 * @ORM\Table(name="Direction", indexes={@ORM\Index(name="IDX_BCBB53106DFE2C5A", columns={"Code_Orchestre"}), @ORM\Index(name="IDX_BCBB5310E694D5AB", columns={"Code_Musicien"}), @ORM\Index(name="IDX_BCBB5310D990D4F0", columns={"Code_Morceau"})})
 * @ORM\Entity
 */
class Direction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Direction", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeDirection;

    /**
     * @var Orchestres
     *
     * @ORM\ManyToOne(targetEntity="Orchestres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Orchestre", referencedColumnName="Code_Orchestre")
     * })
     */
    private $codeOrchestre;

    /**
     * @var Musicien
     *
     * @ORM\ManyToOne(targetEntity="Musicien", inversedBy="directions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Musicien", referencedColumnName="Code_Musicien")
     * })
     */
    private $codeMusicien;

    /**
     * @var Enregistrement
     *
     * @ORM\ManyToOne(targetEntity="Enregistrement", inversedBy="directions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Morceau", referencedColumnName="Code_Morceau")
     * })
     */
    private $codeMorceau;


    /**
     * Get codeDirection
     *
     * @return integer
     */
    public function getCodeDirection()
    {
        return $this->codeDirection;
    }

    /**
     * Set codeOrchestre
     *
     * @param Orchestres $codeOrchestre
     *
     * @return Direction
     */
    public function setCodeOrchestre(Orchestres $codeOrchestre = null)
    {
        $this->codeOrchestre = $codeOrchestre;

        return $this;
    }

    /**
     * Get codeOrchestre
     *
     * @return Orchestres
     */
    public function getCodeOrchestre()
    {
        return $this->codeOrchestre;
    }

    /**
     * Set codeMusicien
     *
     * @param Musicien $codeMusicien
     *
     * @return Direction
     */
    public function setCodeMusicien(Musicien $codeMusicien = null)
    {
        $this->codeMusicien = $codeMusicien;

        return $this;
    }

    /**
     * Get codeMusicien
     *
     * @return Musicien
     */
    public function getCodeMusicien()
    {
        return $this->codeMusicien;
    }

    /**
     * Set codeMorceau
     *
     * @param Enregistrement $codeMorceau
     *
     * @return Direction
     */
    public function setCodeMorceau(Enregistrement $codeMorceau = null)
    {
        $this->codeMorceau = $codeMorceau;

        return $this;
    }

    /**
     * Get codeMorceau
     *
     * @return Enregistrement
     */
    public function getCodeMorceau()
    {
        return $this->codeMorceau;
    }
}

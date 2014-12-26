<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interpréter
 *
 * @ORM\Table(name="Interpréter", indexes={@ORM\Index(name="IDX_12B376CFE694D5AB", columns={"Code_Musicien"}), @ORM\Index(name="IDX_12B376CFD990D4F0", columns={"Code_Morceau"}), @ORM\Index(name="IDX_12B376CFD389A975", columns={"Code_Instrument"})})
 * @ORM\Entity
 */
class Interpreter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Interpréter", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeInterpréter;

    /**
     * @var Musicien
     *
     * @ORM\ManyToOne(targetEntity="Musicien", inversedBy="interpreters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Musicien", referencedColumnName="Code_Musicien")
     * })
     */
    private $codeMusicien;

    /**
     * @var Enregistrement
     *
     * @ORM\ManyToOne(targetEntity="Enregistrement", inversedBy="interpreters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Morceau", referencedColumnName="Code_Morceau")
     * })
     */
    private $codeMorceau;

    /**
     * @var Instrument
     *
     * @ORM\ManyToOne(targetEntity="Instrument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Instrument", referencedColumnName="Code_Instrument")
     * })
     */
    private $codeInstrument;


    /**
     * Get codeInterpréter
     *
     * @return integer
     */
    public function getCodeInterpreter()
    {
        return $this->codeInterpréter;
    }

    /**
     * Set codeMusicien
     *
     * @param Musicien $codeMusicien
     *
     * @return Interpreter
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
     * @return Interpreter
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

    /**
     * Set codeInstrument
     *
     * @param Instrument $codeInstrument
     *
     * @return Interpreter
     */
    public function setCodeInstrument(Instrument $codeInstrument = null)
    {
        $this->codeInstrument = $codeInstrument;

        return $this;
    }

    /**
     * Get codeInstrument
     *
     * @return Instrument
     */
    public function getCodeInstrument()
    {
        return $this->codeInstrument;
    }
}

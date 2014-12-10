<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonné
 *
 * @ORM\Table(name="Abonné", uniqueConstraints={@ORM\UniqueConstraint(name="IX_Abonné", columns={"Nom_Abonné", "Prénom_Abonné"}), @ORM\UniqueConstraint(name="IX_Abonné_1", columns={"Login"})}, indexes={@ORM\Index(name="IDX_F72316A520B77BF2", columns={"Code_Pays"})})
 * @ORM\Entity
 */
class Abonne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Abonné", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAbonné;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Abonné", type="string", length=50, nullable=false)
     */
    private $nomAbonné;

    /**
     * @var string
     *
     * @ORM\Column(name="Prénom_Abonné", type="string", length=20, nullable=true)
     */
    private $prénomAbonné;

    /**
     * @var string
     *
     * @ORM\Column(name="Login", type="string", length=10, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=10, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=50, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville", type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="Code_Postal", type="string", length=50, nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=0, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="UserId", type="string", length=128, nullable=true)
     */
    private $userid;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Pays", referencedColumnName="Code_Pays")
     * })
     */
    private $codePays;



    /**
     * Get codeAbonné
     *
     * @return integer 
     */
    public function getCodeAbonné()
    {
        return $this->codeAbonné;
    }

    /**
     * Set nomAbonné
     *
     * @param string $nomAbonné
     * @return Abonné
     */
    public function setNomAbonné($nomAbonné)
    {
        $this->nomAbonné = $nomAbonné;

        return $this;
    }

    /**
     * Get nomAbonné
     *
     * @return string 
     */
    public function getNomAbonné()
    {
        return $this->nomAbonné;
    }

    /**
     * Set prénomAbonné
     *
     * @param string $prénomAbonné
     * @return Abonné
     */
    public function setPrénomAbonné($prénomAbonné)
    {
        $this->prénomAbonné = $prénomAbonné;

        return $this;
    }

    /**
     * Get prénomAbonné
     *
     * @return string 
     */
    public function getPrénomAbonné()
    {
        return $this->prénomAbonné;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Abonné
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Abonné
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Abonné
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Abonné
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     * @return Abonné
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Abonné
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set userid
     *
     * @param string $userid
     * @return Abonné
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return string 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set codePays
     *
     * @param \ProjetWeb\ClassiqueBundle\Entity\Pays $codePays
     * @return Abonné
     */
    public function setCodePays(\ProjetWeb\ClassiqueBundle\Entity\Pays $codePays = null)
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get codePays
     *
     * @return \ProjetWeb\ClassiqueBundle\Entity\Pays 
     */
    public function getCodePays()
    {
        return $this->codePays;
    }
}

<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnã©
 *
 * @ORM\Table(name="AbonnÃ©", uniqueConstraints={@ORM\UniqueConstraint(name="IX_AbonnÃ©", columns={"Nom_AbonnÃ©", "PrÃ©nom_AbonnÃ©"}), @ORM\UniqueConstraint(name="IX_AbonnÃ©_1", columns={"Login"})}, indexes={@ORM\Index(name="IDX_F72316A520B77BF2", columns={"Code_Pays"})})
 * @ORM\Entity
 */
class Abonnã©
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_AbonnÃ©", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAbonnã©;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_AbonnÃ©", type="string", length=50, nullable=false)
     */
    private $nomAbonnã©;

    /**
     * @var string
     *
     * @ORM\Column(name="PrÃ©nom_AbonnÃ©", type="string", length=20, nullable=true)
     */
    private $prã©nomAbonnã©;

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
     * Get codeAbonnã©
     *
     * @return integer 
     */
    public function getCodeAbonnã©()
    {
        return $this->codeAbonnã©;
    }

    /**
     * Set nomAbonnã©
     *
     * @param string $nomAbonnã©
     * @return Abonnã©
     */
    public function setNomAbonnã©($nomAbonnã©)
    {
        $this->nomAbonnã© = $nomAbonnã©;

        return $this;
    }

    /**
     * Get nomAbonnã©
     *
     * @return string 
     */
    public function getNomAbonnã©()
    {
        return $this->nomAbonnã©;
    }

    /**
     * Set prã©nomAbonnã©
     *
     * @param string $prã©nomAbonnã©
     * @return Abonnã©
     */
    public function setPrã©nomAbonnã©($prã©nomAbonnã©)
    {
        $this->prã©nomAbonnã© = $prã©nomAbonnã©;

        return $this;
    }

    /**
     * Get prã©nomAbonnã©
     *
     * @return string 
     */
    public function getPrã©nomAbonnã©()
    {
        return $this->prã©nomAbonnã©;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Abonnã©
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
     * @return Abonnã©
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
     * @return Abonnã©
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
     * @return Abonnã©
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
     * @return Abonnã©
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
     * @return Abonnã©
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
     * @return Abonnã©
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
     * @return Abonnã©
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

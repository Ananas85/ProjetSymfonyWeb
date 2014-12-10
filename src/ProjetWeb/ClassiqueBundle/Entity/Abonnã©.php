<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonn�
 *
 * @ORM\Table(name="Abonné", uniqueConstraints={@ORM\UniqueConstraint(name="IX_Abonné", columns={"Nom_Abonné", "Prénom_Abonné"}), @ORM\UniqueConstraint(name="IX_Abonné_1", columns={"Login"})}, indexes={@ORM\Index(name="IDX_F72316A520B77BF2", columns={"Code_Pays"})})
 * @ORM\Entity
 */
class Abonn�
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Abonné", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAbonn�;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Abonné", type="string", length=50, nullable=false)
     */
    private $nomAbonn�;

    /**
     * @var string
     *
     * @ORM\Column(name="Prénom_Abonné", type="string", length=20, nullable=true)
     */
    private $pr�nomAbonn�;

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
     * Get codeAbonn�
     *
     * @return integer 
     */
    public function getCodeAbonn�()
    {
        return $this->codeAbonn�;
    }

    /**
     * Set nomAbonn�
     *
     * @param string $nomAbonn�
     * @return Abonn�
     */
    public function setNomAbonn�($nomAbonn�)
    {
        $this->nomAbonn� = $nomAbonn�;

        return $this;
    }

    /**
     * Get nomAbonn�
     *
     * @return string 
     */
    public function getNomAbonn�()
    {
        return $this->nomAbonn�;
    }

    /**
     * Set pr�nomAbonn�
     *
     * @param string $pr�nomAbonn�
     * @return Abonn�
     */
    public function setPr�nomAbonn�($pr�nomAbonn�)
    {
        $this->pr�nomAbonn� = $pr�nomAbonn�;

        return $this;
    }

    /**
     * Get pr�nomAbonn�
     *
     * @return string 
     */
    public function getPr�nomAbonn�()
    {
        return $this->pr�nomAbonn�;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Abonn�
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
     * @return Abonn�
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
     * @return Abonn�
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
     * @return Abonn�
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
     * @return Abonn�
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
     * @return Abonn�
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
     * @return Abonn�
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
     * @return Abonn�
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

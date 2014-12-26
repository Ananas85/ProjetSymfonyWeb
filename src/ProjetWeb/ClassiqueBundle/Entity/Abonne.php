<?php

namespace ProjetWeb\ClassiqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Abonné
 *
 * @ORM\Table(name="Abonné", uniqueConstraints={@ORM\UniqueConstraint(name="IX_Abonné", columns={"Nom_Abonné", "Prénom_Abonné"}), @ORM\UniqueConstraint(name="IX_Abonné_1", columns={"Login"})}, indexes={@ORM\Index(name="IDX_F72316A520B77BF2", columns={"Code_Pays"})})
 * @ORM\Entity
 */
class Abonne implements UserInterface
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
     * @var Pays
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
    public function getCodeAbonne()
    {
        return $this->codeAbonné;
    }

    /**
     * Set nomAbonné
     *
     * @param string $nomAbonné
     *
     * @return Abonne
     */
    public function setNomAbonne($nomAbonné)
    {
        $this->nomAbonné = $nomAbonné;

        return $this;
    }

    /**
     * Get nomAbonné
     *
     * @return string
     */
    public function getNomAbonne()
    {
        return $this->nomAbonné;
    }

    /**
     * Set prénomAbonné
     *
     * @param string $prénomAbonné
     *
     * @return Abonne
     */
    public function setPrenomAbonne($prénomAbonné)
    {
        $this->prénomAbonné = $prénomAbonné;

        return $this;
    }

    /**
     * Get prénomAbonné
     *
     * @return string
     */
    public function getPrenomAbonne()
    {
        return $this->prénomAbonné;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Abonne
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
     *
     * @return Abonne
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
     *
     * @return Abonne
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
     *
     * @return Abonne
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
     *
     * @return Abonne
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
     *
     * @return Abonne
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
     *
     * @return Abonne
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
     *
     * @return Abonne
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

    /**
     * Returns the roles granted to the user.
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * Returns the salt that was originally used to encode the password.
     * This can return null if the password was not encoded using a salt.
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     * @return string The username
     */
    public function getUsername()
    {
        return $this->login;
    }

    /**
     * Removes sensitive data from the user.
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
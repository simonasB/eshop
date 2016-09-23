<?php

namespace VartotojasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Serializable;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Vartotojas
 *
 * @ORM\Table(name="vartotojas")
 * @ORM\Entity(repositoryClass="VartotojasBundle\Repository\VartotojasRepository")
 * @UniqueEntity(fields="vartotojoVardas", message="Toks vartotojo vardas jau egzistuoja.")
 * @UniqueEntity(fields="elPastas", message="Toks el-paštas jau egzistuoja.")
 */
class Vartotojas implements AdvancedUserInterface, Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Turi būti mažiausiai trijų simbolio ilgio.")
     * @Assert\Length(min=3, minMessage="Turi būti mažiausiai trijų simbolio ilgio.")
     * @ORM\Column(name="prisijungimoVardas", type="string", length=30, unique=true)
     */
    private $prisijungimoVardas;

    /**
     * @var string
     *
     * @ORM\Column(name="slaptazodis", type="string", length=255)
     */
    private $slaptazodis;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Email
     * @ORM\Column(name="elPastas", type="string", length=50, unique=true)
     */
    private $elPastas;

    /**
     * @var string
     *
     * @ORM\Column(name="vardas", type="string", length=30)
     */
    private $vardas;

    /**
     * @var string
     *
     * @ORM\Column(name="pavarde", type="string", length=30)
     */
    private $pavarde;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonas", type="string", length=30)
     */
    private $telefonas;

    /**
     * @var string
     *
     * @ORM\Column(name="adresas", type="string", length=50)
     */
    private $adresas;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json_array")
     */
    private $roles = array();

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $arAktyvus = true;

    /**
     * @Assert\NotBlank
     * @Assert\Regex(
     *      pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/",
     *      message="Use 1 upper case letter, 1 lower case letter, and 1 number"
     * )
     */
    private $neuzkoduotasSlaptazodis; //plainPassword
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prisijungimoVardas
     *
     * @param string $prisijungimoVardas
     *
     * @return Vartotojas
     */
    public function setPrisijungimoVardas($prisijungimoVardas)
    {
        $this->prisijungimoVardas = $prisijungimoVardas;

        return $this;
    }

    /**
     * Get prisijungimoVardas
     *
     * @return string
     */
    public function getPrisijungimoVardas()
    {
        return $this->prisijungimoVardas;
    }

    /**
     * Set slaptazodis
     *
     * @param string $slaptazodis
     *
     * @return Vartotojas
     */
    public function setSlaptazodis($slaptazodis)
    {
        $this->slaptazodis = $slaptazodis;

        return $this;
    }

    /**
     * Get slaptazodis
     *
     * @return string
     */
    public function getSlaptazodis()
    {
        return $this->slaptazodis;
    }

    /**
     * Set elPastas
     *
     * @param string $elPastas
     *
     * @return Vartotojas
     */
    public function setElPastas($elPastas)
    {
        $this->elPastas = $elPastas;

        return $this;
    }

    /**
     * Get elPastas
     *
     * @return string
     */
    public function getElPastas()
    {
        return $this->elPastas;
    }

    /**
     * Set vardas
     *
     * @param string $vardas
     *
     * @return Vartotojas
     */
    public function setVardas($vardas)
    {
        $this->vardas = $vardas;

        return $this;
    }

    /**
     * Get vardas
     *
     * @return string
     */
    public function getVardas()
    {
        return $this->vardas;
    }

    /**
     * Set pavarde
     *
     * @param string $pavarde
     *
     * @return Vartotojas
     */
    public function setPavarde($pavarde)
    {
        $this->pavarde = $pavarde;

        return $this;
    }

    /**
     * Get pavarde
     *
     * @return string
     */
    public function getPavarde()
    {
        return $this->pavarde;
    }

    /**
     * Set telefonas
     *
     * @param string $telefonas
     *
     * @return Vartotojas
     */
    public function setTelefonas($telefonas)
    {
        $this->telefonas = $telefonas;

        return $this;
    }

    /**
     * Get telefonas
     *
     * @return string
     */
    public function getTelefonas()
    {
        return $this->telefonas;
    }

    /**
     * Set adresas
     *
     * @param string $adresas
     *
     * @return Vartotojas
     */
    public function setAdresas($adresas)
    {
        $this->adresas = $adresas;

        return $this;
    }

    /**
     * Get adresas
     *
     * @return string
     */
    public function getAdresas()
    {
        return $this->adresas;
    }

    /**
     * @return boolean
     */
    public function getArAktyvus()
    {
        return $this->arAktyvus;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return Vartotojas
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function getNeuzkoduotasSlaptazodis()
    {
        return $this->neuzkoduotasSlaptazodis;
    }

    public function setNeuzkoduotasSlaptazodis($neuzkoduotasSlaptazodis)
    {
        $this->neuzkoduotasSlaptazodis = $neuzkoduotasSlaptazodis;

        $this->setSlaptazodis(null);

        return $this;
    }

    /**
     * Checks whether the user's account has expired.
     *
     * Internally, if this method returns false, the authentication system
     * will throw an AccountExpiredException and prevent login.
     *
     * @return bool true if the user's account is non expired, false otherwise
     *
     * @see AccountExpiredException
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * Checks whether the user is locked.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a LockedException and prevent login.
     *
     * @return bool true if the user is not locked, false otherwise
     *
     * @see LockedException
     */
    public function isAccountNonLocked()
    {
        // TODO: Implement isAccountNonLocked() method.
        return true;
    }

    /**
     * Checks whether the user's credentials (password) has expired.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a CredentialsExpiredException and prevent login.
     *
     * @return bool true if the user's credentials are non expired, false otherwise
     *
     * @see CredentialsExpiredException
     */
    public function isCredentialsNonExpired()
    {
        // TODO: Implement isCredentialsNonExpired() method.
        return true;
    }

    /**
     * Checks whether the user is enabled.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a DisabledException and prevent login.
     *
     * @return bool true if the user is enabled, false otherwise
     *
     * @see DisabledException
     */
    public function isEnabled()
    {
        // TODO: Implement isEnabled() method.
        return $this->getArAktyvus();
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized);
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
        return $this->getSlaptazodis();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getPrisijungimoVardas();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        $this->setPlainPassword(null);
    }
}


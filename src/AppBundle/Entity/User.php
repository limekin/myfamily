<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="usermaster")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="family_id", type="integer")
     */
    private $familyId;

    /**
     * @ORM\ManyToOne(targetEntity="Family", inversedBy="users")
     * @ORM\JoinColumn(name="family_id", referencedColumnName="family_id")
     */
    private $family;
    
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=200)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="countrycode", type="string", length=10)
     */
    private $countrycode = 'none';

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=20)
     */
    private $phoneNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="user_type", type="integer")
     */
    private $userType = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="active_status", type="integer")
     */
    private $activeStatus = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="verified", type="integer")
     */
    private $verified = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="date")
     */
    private $createdOn;

    /**
     * @var int
     *
     * @ORM\Column(name="created_by", type="integer")
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_on", type="date")
     */
    private $modifiedOn;

    /**
     * @var int
     *
     * @ORM\Column(name="modified_by", type="integer")
     */
    private $modifiedBy;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return User
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set familyId
     *
     * @param integer $familyId
     *
     * @return User
     */
    public function setFamilyId($familyId)
    {
        $this->familyId = $familyId;

        return $this;
    }

    /**
     * Get familyId
     *
     * @return int
     */
    public function getFamilyId()
    {
        return $this->familyId;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
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
     * Set countrycode
     *
     * @param string $countrycode
     *
     * @return User
     */
    public function setCountrycode($countrycode)
    {
        $this->countrycode = $countrycode;

        return $this;
    }

    /**
     * Get countrycode
     *
     * @return string
     */
    public function getCountrycode()
    {
        return $this->countrycode;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set userType
     *
     * @param integer $userType
     *
     * @return User
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return int
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set activeStatus
     *
     * @param integer $activeStatus
     *
     * @return User
     */
    public function setActiveStatus($activeStatus)
    {
        $this->activeStatus = $activeStatus;

        return $this;
    }

    /**
     * Get activeStatus
     *
     * @return int
     */
    public function getActiveStatus()
    {
        return $this->activeStatus;
    }

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return User
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return User
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return int
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set modifiedOn
     *
     * @param \DateTime $modifiedOn
     *
     * @return User
     */
    public function setModifiedOn($modifiedOn)
    {
        $this->modifiedOn = $modifiedOn;

        return $this;
    }

    /**
     * Get modifiedOn
     *
     * @return \DateTime
     */
    public function getModifiedOn()
    {
        return $this->modifiedOn;
    }

    /**
     * Set modifiedBy
     *
     * @param integer $modifiedBy
     *
     * @return User
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return int
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set verified
     *
     * @param integer $verified
     *
     * @return User
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified
     *
     * @return integer
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set family
     *
     * @param \AppBundle\Entity\Family $family
     *
     * @return User
     */
    public function setFamily(\AppBundle\Entity\Family $family = null)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return \AppBundle\Entity\Family
     */
    public function getFamily()
    {
        return $this->family;
    }

    public function getRoles() {
        return array('ROLE_USER');
    }
    public function getSalt() {
        return null;
    }

    public function eraseCredentials() {

    }

    public function serialize() {
        return serialize(array(
            $this->userId,
            $this->username,
            $this->password
        ));
    }

    public function unserialize($serialized) {
        list(
            $this->userId,
            $this->username,
            $this->password
        ) = unserialize($serialized);
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Family
 *
 * @ORM\Table(name="family")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FamilyRepository")
 */
class Family
{

    /**
     * @var int
     *
     * @ORM\Column(name="family_id", type="integer", unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $familyId;

    /**
     * @var string
     *
     * @ORM\Column(name="family_name", type="string", length=250)
     */
    private $familyName;

    /**
     * @var string
     *
     * @ORM\Column(name="family_domain", type="string", length=200)
     */
    private $familyDomain;

    /**
     * @var string
     *
     * @ORM\Column(name="family_keyword", type="string", length=200)
     */
    private $familyKeyword;

    /**
     * @var string
     *
     * @ORM\Column(name="family_logo", type="text")
     */
    private $familyLogo;

    /**
     * @var bool
     *
     * @ORM\Column(name="active_status", type="boolean")
     */
    private $activeStatus = 1;

    /**
     * @var bool
     *
     * @ORM\Column(name="top_panel", type="boolean")
     */
    private $topPanel = 1;

    /**
     * @var bool
     *
     * @ORM\Column(name="bottom_panel", type="boolean")
     */
    private $bottomPanel = 1;

    /**
     * @var date
     * @ORM\Column(name="created_on", type="date")
     */
    private $createdOn;

    /**
     * @ORM\Column(name="created_by", type="integer")
     */
    private $createdBy;

    /**
     * @ORM\Column(name="modified_on", type="date")
     */
    private $modifiedOn;

    /**
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
     * Set familyId
     *
     * @param integer $familyId
     *
     * @return Family
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
     * Set familyName
     *
     * @param string $familyName
     *
     * @return Family
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * Get familyName
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Set familyDomain
     *
     * @param string $familyDomain
     *
     * @return Family
     */
    public function setFamilyDomain($familyDomain)
    {
        $this->familyDomain = $familyDomain;

        return $this;
    }

    /**
     * Get familyDomain
     *
     * @return string
     */
    public function getFamilyDomain()
    {
        return $this->familyDomain;
    }

    /**
     * Set familyKeyword
     *
     * @param string $familyKeyword
     *
     * @return Family
     */
    public function setFamilyKeyword($familyKeyword)
    {
        $this->familyKeyword = $familyKeyword;

        return $this;
    }

    /**
     * Get familyKeyword
     *
     * @return string
     */
    public function getFamilyKeyword()
    {
        return $this->familyKeyword;
    }

    /**
     * Set familyLogo
     *
     * @param string $familyLogo
     *
     * @return Family
     */
    public function setFamilyLogo($familyLogo)
    {
        $this->familyLogo = $familyLogo;

        return $this;
    }

    /**
     * Get familyLogo
     *
     * @return string
     */
    public function getFamilyLogo()
    {
        return $this->familyLogo;
    }

    /**
     * Set activeStatus
     *
     * @param boolean $activeStatus
     *
     * @return Family
     */
    public function setActiveStatus($activeStatus)
    {
        $this->activeStatus = $activeStatus;

        return $this;
    }

    /**
     * Get activeStatus
     *
     * @return bool
     */
    public function getActiveStatus()
    {
        return $this->activeStatus;
    }

    /**
     * Set topPanel
     *
     * @param boolean $topPanel
     *
     * @return Family
     */
    public function setTopPanel($topPanel)
    {
        $this->topPanel = $topPanel;

        return $this;
    }

    /**
     * Get topPanel
     *
     * @return bool
     */
    public function getTopPanel()
    {
        return $this->topPanel;
    }

    /**
     * Set bottomPanel
     *
     * @param boolean $bottomPanel
     *
     * @return Family
     */
    public function setBottomPanel($bottomPanel)
    {
        $this->bottomPanel = $bottomPanel;

        return $this;
    }

    /**
     * Get bottomPanel
     *
     * @return bool
     */
    public function getBottomPanel()
    {
        return $this->bottomPanel;
    }

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return Family
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
     * @return Family
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer
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
     * @return Family
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
     * @return Family
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return integer
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }
}

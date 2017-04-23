<?php

namespace alkani\PSIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task", indexes={@ORM\Index(name="has_3", columns={"fk_projectId"}), @ORM\Index(name="has_4", columns={"fk_userId"})})
 * @ORM\Entity
 */
class Task
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=20, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="date", nullable=true)
     */
    private $deadline;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="priorities", type="smallint", nullable=true)
     */
    private $priorities;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \alkani\PSIBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="alkani\PSIBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_projectId", referencedColumnName="id")
     * })
     */
    private $fkProjectid;

    /**
     * @var \alkani\PSIBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="alkani\PSIBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_userId", referencedColumnName="id")
     * })
     */
    private $fkUserid;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Task
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Task
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     *
     * @return Task
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Task
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set priorities
     *
     * @param integer $priorities
     *
     * @return Task
     */
    public function setPriorities($priorities)
    {
        $this->priorities = $priorities;

        return $this;
    }

    /**
     * Get priorities
     *
     * @return integer
     */
    public function getPriorities()
    {
        return $this->priorities;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fkProjectid
     *
     * @param \alkani\PSIBundle\Entity\Project $fkProjectid
     *
     * @return Task
     */
    public function setFkProjectid(\alkani\PSIBundle\Entity\Project $fkProjectid = null)
    {
        $this->fkProjectid = $fkProjectid;

        return $this;
    }

    /**
     * Get fkProjectid
     *
     * @return \alkani\PSIBundle\Entity\Project
     */
    public function getFkProjectid()
    {
        return $this->fkProjectid;
    }

    /**
     * Set fkUserid
     *
     * @param \alkani\PSIBundle\Entity\User $fkUserid
     *
     * @return Task
     */
    public function setFkUserid(\alkani\PSIBundle\Entity\User $fkUserid = null)
    {
        $this->fkUserid = $fkUserid;

        return $this;
    }

    /**
     * Get fkUserid
     *
     * @return \alkani\PSIBundle\Entity\User
     */
    public function getFkUserid()
    {
        return $this->fkUserid;
    }
}

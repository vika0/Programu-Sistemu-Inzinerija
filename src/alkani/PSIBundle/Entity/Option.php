<?php

namespace alkani\PSIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Option
 *
 * @ORM\Table(name="option", indexes={@ORM\Index(name="has_5", columns={"fk_taskId"})})
 * @ORM\Entity
 */
class Option
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=40, nullable=false)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_checked", type="boolean", nullable=false)
     */
    private $isChecked;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \alkani\PSIBundle\Entity\Task
     *
     * @ORM\ManyToOne(targetEntity="alkani\PSIBundle\Entity\Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_taskId", referencedColumnName="id")
     * })
     */
    private $fkTaskid;



    /**
     * Set description
     *
     * @param string $description
     *
     * @return Option
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
     * Set isChecked
     *
     * @param boolean $isChecked
     *
     * @return Option
     */
    public function setIsChecked($isChecked)
    {
        $this->isChecked = $isChecked;

        return $this;
    }

    /**
     * Get isChecked
     *
     * @return boolean
     */
    public function getIsChecked()
    {
        return $this->isChecked;
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
     * Set fkTaskid
     *
     * @param \alkani\PSIBundle\Entity\Task $fkTaskid
     *
     * @return Option
     */
    public function setFkTaskid(\alkani\PSIBundle\Entity\Task $fkTaskid = null)
    {
        $this->fkTaskid = $fkTaskid;

        return $this;
    }

    /**
     * Get fkTaskid
     *
     * @return \alkani\PSIBundle\Entity\Task
     */
    public function getFkTaskid()
    {
        return $this->fkTaskid;
    }
}

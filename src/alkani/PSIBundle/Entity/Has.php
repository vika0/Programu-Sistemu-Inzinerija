<?php

namespace alkani\PSIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Has
 *
 * @ORM\Table(name="has", indexes={@ORM\Index(name="IDX_C6F39EADCAB767", columns={"fk_projectId"})})
 * @ORM\Entity
 */
class Has
{
    /**
     * @var integer
     *
     * @ORM\Column(name="fk_userId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fkUserid;

    /**
     * @var \alkani\PSIBundle\Entity\Project
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="alkani\PSIBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_projectId", referencedColumnName="id")
     * })
     */
    private $fkProjectid;



    /**
     * Set fkUserid
     *
     * @param integer $fkUserid
     *
     * @return Has
     */
    public function setFkUserid($fkUserid)
    {
        $this->fkUserid = $fkUserid;

        return $this;
    }

    /**
     * Get fkUserid
     *
     * @return integer
     */
    public function getFkUserid()
    {
        return $this->fkUserid;
    }

    /**
     * Set fkProjectid
     *
     * @param \alkani\PSIBundle\Entity\Project $fkProjectid
     *
     * @return Has
     */
    public function setFkProjectid(\alkani\PSIBundle\Entity\Project $fkProjectid)
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
}

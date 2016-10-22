<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BoringMachine
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BoringMachineRepository")
 */
class BoringMachine
{



    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var datetime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id")
     */
    private $createdBy;

    /**
     * @var string
     *
     * @ORM\Column(name="BoringMachineType", type="string" ,length=10,nullable=false)
     */
    private $type;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Breakdown")
     * @ORM\JoinColumn(name="breakdown_id", referencedColumnName="id")
     */
    private $breakdown;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BoringMachine
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return BoringMachine
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     *
     * @return BoringMachine
     */
    public function setCreatedBy(\AppBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set breakdown
     *
     * @param \AppBundle\Entity\Breakdown $breakdown
     *
     * @return BoringMachine
     */
    public function setBreakdown(\AppBundle\Entity\Breakdown $breakdown = null)
    {
        $this->breakdown = $breakdown;

        return $this;
    }

    /**
     * Get breakdown
     *
     * @return \AppBundle\Entity\Breakdown
     */
    public function getBreakdown()
    {
        return $this->breakdown;
    }
}

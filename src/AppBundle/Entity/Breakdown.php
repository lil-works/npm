<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BreakdownRepository")
 */
class Breakdown
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BoringMachine", mappedBy="breakdown" , cascade={"remove","persist"})
     */
    private $boringMachines;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id")
     */
    private $createdBy;
    /**
     * @var datetime
     *
     * @ORM\Column(name="createdAt", type="datetime",nullable=true)
     */
    private $createdAt;
    /**
     * @var datetime
     *
     * @ORM\Column(name="start", type="datetime",nullable=true)
     */
    private $start;

    /**
     * @var datetime
     *
     * @ORM\Column(name="stop", type="datetime",nullable=true)
     */
    private $stop;



    /**
     * @var boolean
     *
     * @ORM\Column(name="closed", type="boolean",nullable=true)
     */
    private $closed;



    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",nullable=true)
     */
    private $description;


    /**
     * @ORM\ManyToMany(targetEntity="Descriptor", inversedBy="breakdowns")
     * @ORM\JoinTable(name="breakdowns_descriptors")
     */
    private $descriptors;



    /**
     * @ORM\OneToMany(targetEntity="BreakdownsInterferos", mappedBy="breakdown" ,cascade={"remove","persist"})
     */
    protected $breakdowns_interferos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->descriptors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->breakdowns_interferos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Breakdown
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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Breakdown
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set stop
     *
     * @param \DateTime $stop
     *
     * @return Breakdown
     */
    public function setStop($stop)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * Get stop
     *
     * @return \DateTime
     */
    public function getStop()
    {
        return $this->stop;
    }



    /**
     * Set closed
     *
     * @param boolean $closed
     *
     * @return Breakdown
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;

        return $this;
    }

    /**
     * Get closed
     *
     * @return boolean
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Breakdown
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
     * Add boringMachine
     *
     * @param \AppBundle\Entity\BoringMachine $boringMachine
     *
     * @return Breakdown
     */
    public function addBoringMachine(\AppBundle\Entity\BoringMachine $boringMachine)
    {
        $this->boringMachines[] = $boringMachine;

        return $this;
    }

    /**
     * Remove boringMachine
     *
     * @param \AppBundle\Entity\BoringMachine $boringMachine
     */
    public function removeBoringMachine(\AppBundle\Entity\BoringMachine $boringMachine)
    {
        $this->boringMachines->removeElement($boringMachine);
    }

    /**
     * Get boringMachines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoringMachines()
    {
        return $this->boringMachines;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     *
     * @return Breakdown
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
     * Add descriptor
     *
     * @param \AppBundle\Entity\Descriptor $descriptor
     *
     * @return Breakdown
     */
    public function addDescriptor(\AppBundle\Entity\Descriptor $descriptor)
    {
        $this->descriptors[] = $descriptor;

        return $this;
    }

    /**
     * Remove descriptor
     *
     * @param \AppBundle\Entity\Descriptor $descriptor
     */
    public function removeDescriptor(\AppBundle\Entity\Descriptor $descriptor)
    {
        $this->descriptors->removeElement($descriptor);
    }

    /**
     * Get descriptors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDescriptors()
    {
        return $this->descriptors;
    }

    /**
     * Add breakdownsInterfero
     *
     * @param \AppBundle\Entity\BreakdownsInterferos $breakdownsInterfero
     *
     * @return Breakdown
     */
    public function addBreakdownsInterfero(\AppBundle\Entity\BreakdownsInterferos $breakdownsInterfero)
    {
        $this->breakdowns_interferos[] = $breakdownsInterfero;

        return $this;
    }

    /**
     * Remove breakdownsInterfero
     *
     * @param \AppBundle\Entity\BreakdownsInterferos $breakdownsInterfero
     */
    public function removeBreakdownsInterfero(\AppBundle\Entity\BreakdownsInterferos $breakdownsInterfero)
    {
        $this->breakdowns_interferos->removeElement($breakdownsInterfero);
    }

    /**
     * Get breakdownsInterferos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBreakdownsInterferos()
    {
        return $this->breakdowns_interferos;
    }
}

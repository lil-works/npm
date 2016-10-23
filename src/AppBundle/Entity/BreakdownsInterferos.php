<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BreakdownsInterferosRepository")
 */
class BreakdownsInterferos
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Breakdown", inversedBy="breakdowns_interferos")
     * @ORM\JoinColumn(name="breakdown", referencedColumnName="id", nullable=FALSE)
     */
    protected $breakdown;

    /**
     * @ORM\ManyToOne(targetEntity="Interfero", inversedBy="breakdowns_interferos")
     * @ORM\JoinColumn(name="interfero", referencedColumnName="id", nullable=FALSE)
     */
    protected $interfero;


    /**
     * @ORM\Column(type="boolean")
     */
    protected $status;





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
     * Set status
     *
     * @param boolean $status
     *
     * @return BreakdownsInterferos
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set breakdown
     *
     * @param \AppBundle\Entity\Breakdown $breakdown
     *
     * @return BreakdownsInterferos
     */
    public function setBreakdown(\AppBundle\Entity\Breakdown $breakdown)
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

    /**
     * Set interfero
     *
     * @param \AppBundle\Entity\Interfero $interfero
     *
     * @return BreakdownsInterferos
     */
    public function setInterfero(\AppBundle\Entity\Interfero $interfero)
    {
        $this->interfero = $interfero;

        return $this;
    }

    /**
     * Get interfero
     *
     * @return \AppBundle\Entity\Interfero
     */
    public function getInterfero()
    {
        return $this->interfero;
    }
}

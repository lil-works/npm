<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interfero
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\InterferoRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Interfero
{
    /**
     * @ORM\PreUpdate
     */
    public function formatId() {
        $this->id = $this->antenna . "_" . $this->band;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="string",length=5)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="AppBundle\LilClass\CurrentInterferoIdGenerator")
     */
    private $id;


    /**
     * @var integer
     *
     * @ORM\Column(name="antenna", type="integer")
     */
    private $antenna;
    /**
     * @var integer
     *
     * @ORM\Column(name="band", type="integer")
     */
    private $band;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean", nullable=true)
     */
    private $available;

    /**
     * @ORM\OneToMany(targetEntity="BreakdownsInterferos", mappedBy="interfero", cascade={"persist", "remove"} )
     */
    protected $breakdowns_interferos;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set antenna
     *
     * @param integer $antenna
     *
     * @return Interfero
     */
    public function setAntenna($antenna)
    {
        $this->antenna = $antenna;

        return $this;
    }

    /**
     * Get antenna
     *
     * @return integer
     */
    public function getAntenna()
    {
        return $this->antenna;
    }

    /**
     * Set band
     *
     * @param integer $band
     *
     * @return Interfero
     */
    public function setBand($band)
    {
        $this->band = $band;

        return $this;
    }

    /**
     * Get band
     *
     * @return integer
     */
    public function getBand()
    {
        return $this->band;
    }

    /**
     * Set available
     *
     * @param boolean $available
     *
     * @return Interfero
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Add breakdownsInterfero
     *
     * @param \AppBundle\Entity\BreakdownsInterferos $breakdownsInterfero
     *
     * @return Interfero
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

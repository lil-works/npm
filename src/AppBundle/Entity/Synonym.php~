<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use ManagerBundle\Entity\PMElement;
use Symfony\Component\Validator\Constraints as Assert;
use ManagerBundle\Validator\Constraints as AcmeAssert;

/**
 * Synonym
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SynonymRepository")
 *
 */
class Synonym
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
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=100,unique=true)
     * @AcmeAssert\SynonymElement
     */
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity="Descriptor", inversedBy="synonyms")
     * @ORM\JoinColumn(name="descriptor", referencedColumnName="id")
     */
    private $descriptor;


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
     * Set label
     *
     * @param string $label
     *
     * @return Synonym
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set descriptor
     *
     * @param \AppBundle\Entity\Descriptor $descriptor
     *
     * @return Synonym
     */
    public function setDescriptor(\AppBundle\Entity\Descriptor $descriptor = null)
    {
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * Get descriptor
     *
     * @return \AppBundle\Entity\Descriptor
     */
    public function getDescriptor()
    {
        return $this->descriptor;
    }
}

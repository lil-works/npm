<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Synonym
 *
 * @ORM\Table(name="synonym",uniqueConstraints={@ORM\UniqueConstraint(name="tag", columns={"tag"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SynonymRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Synonym
{

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preTag()
    {
        $this->tag = strtolower( preg_replace("/[^A-Za-z0-9]/", "", $this->label) );
    }


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
     */
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity="Descriptor", inversedBy="synonyms")
     * @ORM\JoinColumn(name="descriptor", referencedColumnName="id")
     */
    private $descriptor;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string" , length=50 , nullable=true)
     */
    private $tag;


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

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return Synonym
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
}

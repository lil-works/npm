<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Person
 *
 * @ORM\Table(name="descriptor",uniqueConstraints={@ORM\UniqueConstraint(name="categoryTag", columns={"category", "tag"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DescriptorRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Descriptor
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
     * @ORM\Column(name="label", type="string" , length=50)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string" , length=50 , nullable=false)
     */
    private $tag;


    /**
     * @ORM\ManyToOne(targetEntity="DescriptorCategory")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="Synonym", mappedBy="descriptor")
     */
    private $synonyms;

    /**
     * @ORM\ManyToMany(targetEntity="Breakdown", mappedBy="descriptors")
     */
    private $breakdowns;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->synonyms = new \Doctrine\Common\Collections\ArrayCollection();
        $this->breakdowns = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set label
     *
     * @param string $label
     *
     * @return Descriptor
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
     * Set tag
     *
     * @param string $tag
     *
     * @return Descriptor
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

    /**
     * Set category
     *
     * @param \AppBundle\Entity\DescriptorCategory $category
     *
     * @return Descriptor
     */
    public function setCategory(\AppBundle\Entity\DescriptorCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\DescriptorCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add synonym
     *
     * @param \AppBundle\Entity\Synonym $synonym
     *
     * @return Descriptor
     */
    public function addSynonym(\AppBundle\Entity\Synonym $synonym)
    {
        $this->synonyms[] = $synonym;

        return $this;
    }

    /**
     * Remove synonym
     *
     * @param \AppBundle\Entity\Synonym $synonym
     */
    public function removeSynonym(\AppBundle\Entity\Synonym $synonym)
    {
        $this->synonyms->removeElement($synonym);
    }

    /**
     * Get synonyms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSynonyms()
    {
        return $this->synonyms;
    }

    /**
     * Add breakdown
     *
     * @param \AppBundle\Entity\Breakdown $breakdown
     *
     * @return Descriptor
     */
    public function addBreakdown(\AppBundle\Entity\Breakdown $breakdown)
    {
        $this->breakdowns[] = $breakdown;

        return $this;
    }

    /**
     * Remove breakdown
     *
     * @param \AppBundle\Entity\Breakdown $breakdown
     */
    public function removeBreakdown(\AppBundle\Entity\Breakdown $breakdown)
    {
        $this->breakdowns->removeElement($breakdown);
    }

    /**
     * Get breakdowns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBreakdowns()
    {
        return $this->breakdowns;
    }
}

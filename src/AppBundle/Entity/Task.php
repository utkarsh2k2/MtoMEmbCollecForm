<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Tag;

/**
 * Task
 *
 * @ORM\Table(name="Task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task {

    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * 
     * @var string
     *
     * @ORM\Column(name="Description", type="string")
     */
    protected $description;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", cascade={"persist"}, inversedBy="tasks")
     */
    protected $tags;

    /**
     * @return ArrayCollection 
     */
    public function __construct() {
        $this->tags = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Task
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Add tags
     *
     * @param Tag $tag
     * @return Task
     */
    public function addTag(Tag $tag) {
        $tag->addTask($this);
        $this->tags->add($tag);
    }

    /**
     * Remove tags
     *
     * @param \AppBundle\Entity\Tag $tags
     */
    public function removeTag(\AppBundle\Entity\Tag $tags) {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags() {
        return $this->tags;
    }

}

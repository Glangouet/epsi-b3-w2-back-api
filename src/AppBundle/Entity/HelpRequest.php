<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HelpRequest
 *
 * @ORM\Table(name="help_request")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HelpRequestRepository")
 */
class HelpRequest
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $projectId;

    /**
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(name="project_request_user",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="request_id", referencedColumnName="id")}
     *      )
     */
    private $usersRequested;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usersRequested = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return HelpRequest
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return HelpRequest
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return HelpRequest
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set projectId.
     *
     * @param \AppBundle\Entity\Project|null $projectId
     *
     * @return HelpRequest
     */
    public function setProjectId(\AppBundle\Entity\Project $projectId = null)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId.
     *
     * @return \AppBundle\Entity\Project|null
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Add usersRequested.
     *
     * @param \AppBundle\Entity\User $usersRequested
     *
     * @return HelpRequest
     */
    public function addUsersRequested(\AppBundle\Entity\User $usersRequested)
    {
        $this->usersRequested[] = $usersRequested;

        return $this;
    }

    /**
     * Remove usersRequested.
     *
     * @param \AppBundle\Entity\User $usersRequested
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUsersRequested(\AppBundle\Entity\User $usersRequested)
    {
        return $this->usersRequested->removeElement($usersRequested);
    }

    /**
     * Get usersRequested.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersRequested()
    {
        return $this->usersRequested;
    }
}

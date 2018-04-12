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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="projectId", type="object")
     */
    private $projectId;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="usersRequested", type="object")
     */
    private $usersRequested;


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
     * @param \stdClass $projectId
     *
     * @return HelpRequest
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId.
     *
     * @return \stdClass
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set usersRequested.
     *
     * @param \stdClass $usersRequested
     *
     * @return HelpRequest
     */
    public function setUsersRequested($usersRequested)
    {
        $this->usersRequested = $usersRequested;

        return $this;
    }

    /**
     * Get usersRequested.
     *
     * @return \stdClass
     */
    public function getUsersRequested()
    {
        return $this->usersRequested;
    }
}

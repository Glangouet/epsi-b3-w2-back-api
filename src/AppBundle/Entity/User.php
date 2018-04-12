<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Privilege")
     * @ORM\JoinTable(name="user_privileges",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="privilege_id", referencedColumnName="id")}
     *      )
     */
    private $privileges;

    /**
     * @ORM\ManyToMany(targetEntity="Skill")
     * @ORM\JoinTable(name="user_skills",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="skill_id", referencedColumnName="id")}
     *      )
     */
    private $skills;

    /**
     * Add privilege.
     *
     * @param \AppBundle\Entity\Privilege $privilege
     *
     * @return User
     */
    public function addPrivilege(\AppBundle\Entity\Privilege $privilege)
    {
        $this->privileges[] = $privilege;

        return $this;
    }

    /**
     * Remove privilege.
     *
     * @param \AppBundle\Entity\Privilege $privilege
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePrivilege(\AppBundle\Entity\Privilege $privilege)
    {
        return $this->privileges->removeElement($privilege);
    }

    /**
     * Get privileges.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrivileges()
    {
        return $this->privileges;
    }

    /**
     * Add skill.
     *
     * @param \AppBundle\Entity\Skill $skill
     *
     * @return User
     */
    public function addSkill(\AppBundle\Entity\Skill $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill.
     *
     * @param \AppBundle\Entity\Skill $skill
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSkill(\AppBundle\Entity\Skill $skill)
    {
        return $this->skills->removeElement($skill);
    }

    /**
     * Get skills.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HasRoleRepository")
 */
class HasRole
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="App\Entity\Employee", inversedBy="roles")
     * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     */
    private $employee;


    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="employees")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    private $role;

    public function getEmployee()
    {
        return $this->employee;
    }


    public function setEmployee($employee): self
    {
        $this->employee = $employee;
        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }


    public function setRole($roles): self
    {
        $this->role = $roles;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }



}

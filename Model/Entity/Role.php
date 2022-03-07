<?php

namespace Model\Entity;

class Role {

    private ?int $id;
    private string $role;

    public function __construct( int $id= null, string $role) {
        $this->id = $id;
        $this->role = $role;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getRole(): string {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void {
        $this->role = $role;
    }
}
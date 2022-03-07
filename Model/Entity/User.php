<?php

namespace Model\Entity;

class User {

    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?string $password;
    private ?int $role_fk;

    /**
     * User constructor.
     * @param string|null $pseudo
     * @param string|null $email
     * @param string|null $password
     * @param int|null $id
     * @param int|null $role_fk
     */
    public function __construct(?int $role_fk = null, string $pseudo = null, string $email = null, string $password = null, ?int $id = null) {
        $this->id = $id;
        $this->username = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->role_fk = $role_fk;
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
     * @return string|null
     */
    public function getPseudo(): ?string {
        return $this->pseudo;
    }

    /**
     * @param string|null $pseudo
     */
    public function setPseudo(?string $pseudo): void {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void {
        $this->password = $password;
    }

    /**
     * @return int|null
     */
    public function getRoleFk(): ?int {
        return $this->role_fk;
    }

    /**
     * @param int|null $role_fk
     */
    public function setRoleFk(?int $role_fk): void {
        $this->role_fk = $role_fk;
    }
}
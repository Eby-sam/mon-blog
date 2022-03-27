<?php

namespace Model\Entity;

class Article {

    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?string $picture;
    private ?User $user_fk;

    public function __construct(int $id= null, string $title = null, string $content = null,  string $picture = null, User $user_fk = null) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->picture = $picture;
        $this->user_fk = $user_fk;
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
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): string {
        $this->title = $title;
        return $title;
    }

    /**
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): string {
        $this->content = $content;
        return $content;
    }

    /**
     * @return string
     */
    public function getPicture(): string {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): string {
        $this->picture = $picture;
        return $picture;
    }

    /**
     * @return User
     */
    public function getUserFk(): User {
        return $this->user_fk;
    }

    /**
     * @param User $user_fk
     */
    public function setUserFk(User $user_fk): void {
        $this->user_fk = $user_fk;
    }
}
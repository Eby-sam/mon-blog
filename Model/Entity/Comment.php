<?php

namespace Model\Entity;

class Comment {
    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?string $date;
    private ?User $user_fk;
    private ?Article $article_fk;

    public function __construct(int $id= null, string $title = null, string $content = null, string $date = null, User $user_fk = null, Article $article_fk = null) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->user_fk = $user_fk;
        $this->article_fk = $article_fk;
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
    public function getDate(): string {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void {
        $this->date = $date;
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

    /**
     * @return Article
     */
    public function getArticleFk(): Article {
        return $this->article_fk;
    }

    /**
     * @param Article $article_fk
     */
    public function setArticleFk(Article $article_fk): void {
        $this->article_fk = $article_fk;
    }
}
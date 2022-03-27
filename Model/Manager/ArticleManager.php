<?php

namespace Model\Manager;

use Model\Entity\Article;
use Model\Entity\User;
use Model\Manager\Traits\ManagerTrait;
use Model\DB;
use Model\User\UserManager;

class ArticleManager {

    use ManagerTrait;

    private UserManager $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }

    /**
     * Return all articles
     */
    public function getAll(): array {
        $articles = [];
        $request = DB::getInstance()->prepare("SELECT * FROM article");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $article_data) {
                $user = UserManager::getManager()->getUser($article_data['user_fk']);
                if($user->getId()) {
                    $articles[] = new Article($article_data['id'], $article_data['title'],  $article_data['content'], $article_data['picture'], $user);
                }
            }
        }
        return $articles;
    }

    /**
     * Return a article based on id.
     * @param $id
     * @return Article
     */
    public function getArticle($id) {
        $request = DB::getInstance()->prepare("SELECT * FROM article WHERE id = :id");
        $request->bindValue(':id', $id);
        $request->execute();
        $article_data = $request->fetch();
        $articles = new Article();
        if ($article_data) {
            $articles->setId($article_data['id']);
            $articles->setTitle($article_data['title']);
            $articles->setContent($article_data['content']);
            $articles->setPicture($article_data['picture']);
            $user = $this->userManager->getUser($article_data['user_fk']);
            $articles->setUserFk($user);
        }
        return $articles;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getArticle2(int $id): array {
        $articles = [];
        $request = DB::getInstance()->prepare("SELECT * FROM article WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $article_data) {
                $user = UserManager::getManager()->getUser($article_data['user_fk']);
                if($user->getId()) {
                    $articles[] = new Article($article_data['id'], $article_data['title'],  $article_data['content'], $article_data['picture'], $user);
                }
            }
        }
        return $articles;
    }

    /**
     * Add an article into the database.
     * @param Article $article
     * @return bool
     */
    public function add(Article $article): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO article (title, content, picture, user_fk)
                VALUES (:title, :content, :picture, :user_fk) 
        ");

        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':picture', $article->getPicture());
        $request->bindValue(':user_fk', $article->getUserFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * @param Article $article
     * @return bool
     */
    public function update (Article $article): bool {
        $request = DB::getInstance()->prepare("UPDATE article SET title = :title, content = :content, picture = :picture WHERE id = :id");

        $request->bindValue(':id', $article->getId());
        $request->bindValue(':title', $article->setTitle($article->getTitle()));
        $request->bindValue(':content', $article->setContent($article->getContent()));
        $request->bindValue(':picture', $article->setPicture($article->getPicture()));

        return $request->execute();
    }

    public function delete (Article $article) {
        $id = $article->getId();
        $request = DB::getInstance()->prepare("DELETE FROM article WHERE id = $id");
        return $request->execute();
    }
}
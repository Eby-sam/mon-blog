<?php

namespace Model\Manager;

use Model\Entity\Article;
use Model\Entity\User;
use Model\Entity\Comment;
use Model\Manager\Traits\ManagerTrait;
use Model\DB;
use Model\User\UserManager;
use Model\Manager\ArticleManager;

class CommentManager {

    use ManagerTrait;

    /**
     * @param int $id
     * @return array
     */
    public function getCommentsArticle(int $article_fk): array {
        $comments = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment WHERE article_fk = $article_fk ORDER BY id DESC");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $comment_data) {
                $user = UserManager::getManager()->getUser($comment_data['user_fk']);
                $article = ArticleManager::getManager()->getArticle($comment_data['article_fk']);
                if($user->getId()) {
                    if ($article->getId()) {
                        $comments[] = new Comment($comment_data['id'], $comment_data['title'], $comment_data['content'], $comment_data['date'], $user, $article);
                    }
                }
            }
        }
        return $comments;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getCommentArticle(int $id): array {
        $comments = [];
        $request = DB::getInstance()->prepare("SELECT * FROM comment WHERE id = $id");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $comment_data) {
                $user = UserManager::getManager()->getUser($comment_data['user_fk']);
                $article = ArticleManager::getManager()->getArticle($comment_data['article_fk']);
                if($user->getId()) {
                    if ($article->getId()) {
                        $comments[] = new Comment($comment_data['id'], $comment_data['title'], $comment_data['content'], $comment_data['date'], $user, $article);
                    }
                }
            }
        }
        return $comments;
    }

    /**
     * Add an article into the database.
     * @param Comment $comment
     * @return bool
     */
    public function add(Comment $comment): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO comment (title, content, date, user_fk, article_fk)
                VALUES (:title, :content, :date, :user_fk, :article_fk) 
        ");

        $request->bindValue(':title', $comment->getTitle());
        $request->bindValue(':content', $comment->getContent());
        $request->bindValue(':date', $comment->getDate());
        $request->bindValue(':user_fk', $comment->getUserFk()->getId());
        $request->bindValue(':article_fk', $comment->getArticleFk()->getId());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * @param Comment $comment
     * @return bool
     */
    public function update (Comment $comment): bool {
        $request = DB::getInstance()->prepare("UPDATE comment SET title = :title, content = :content, date = :date WHERE id = :id");

        $request->bindValue(':id', $comment->getId());
        $request->bindValue(':title', $comment->setTitle($comment->getTitle()));
        $request->bindValue(':content', $comment->setContent($comment->getContent()));
        $request->bindValue(':date', $comment->getDate());

        return $request->execute();
    }

    /**
     * @param Comment $comment
     * @return bool
     */
    public function delete (Comment $comment): bool {
        $id = $comment->getId();
        $request = DB::getInstance()->prepare("DELETE FROM comment WHERE id = $id");
        return $request->execute();
    }
}
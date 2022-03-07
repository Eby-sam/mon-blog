<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;
use Model\Entity\Comment;
use Model\Manager\ArticleManager;
use Model\User\UserManager;
use Model\Manager\CommentManager;


class CommentController {

    use RenderViewTrait;

    /**
     * display the list of comment
     */
    public function commentsArticle($article_fk): array {
        $manager = new CommentManager();
        $comments = $manager->getCommentsArticle($article_fk);

        $this->render('article.comment', 'Article', [
            'comments' => $comments,
        ]);
        return $comments;
    }

    public function commentArticle($id): array {
        $manager = new CommentManager();
        $comments = $manager->getCommentsArticle($id);

        $this->render('update.comment', 'Article', [
            'comments' => $comments,
        ]);
        return $comments;
    }

    /**
     * add a new comment
     * @param $fields
     */
    public function addComment($fields){
        if(isset($fields['title'],$fields['content'], $fields['date'], $fields['user_fk'], $fields['article_fk'])) {
            $userManager = new UserManager();
            $articleManager = new ArticleManager();
            $commentManager = new CommentManager();

            $title = htmlentities($fields['title']);
            $content = htmlentities($fields['content']);
            $date = htmlentities($fields['date']);
            $user_fk = intval($fields['user_fk']);
            $article_fk = intval($fields['article_fk']);

            $user_fk = $userManager->getUser($user_fk);
            $article_fk = $articleManager->getArticle($article_fk);
            if($user_fk->getId()) {
                if ($article_fk->getId()) {
                    $comment = new Comment(null, $title, $content, $date, $user_fk, $article_fk);
                    $commentManager->add($comment);
                }
            }
        }

        $this->render('add.comment', 'Ajouter un commentaire');
    }

    /**
     * Update a comment
     * @param $fields
     */
    public function updateComment($fields) {
        if (isset($fields['id'], $fields['title'], $fields['content'], $fields['date'], $fields['user_fk'], $fields['article_fk'])) {
            $userManager = new UserManager();
            $articleManager = new ArticleManager();
            $commentManager = new CommentManager();

            $id = intval($fields['id']);
            $title = htmlentities($fields['title']);
            $content = htmlentities($fields['content']);
            $date = htmlentities($fields['date']);
            $user_fk = intval($fields['user_fk']);
            $article_fk = intval($fields['article_fk']);

            $user_fk = $userManager->getUser($user_fk);
            $article_fk = $articleManager->getArticle($article_fk);
            if($user_fk->getId()) {
                if ($article_fk->getId()) {
                    $comment = new Comment($id, $title, $content, $date);
                    $commentManager->update($comment);
                }
            }
        }

        $this->render('update.comment', 'Modifier un commentaire');
    }

    /**
     * delete a comment
     * @param $fields
     */
    public function deleteComment($fields) {
        if (isset($fields['id'], $fields['user_fk'], $fields['article_fk'])) {
            $userManager = new UserManager();
            $articleManager = new ArticleManager();
            $commentManager = new CommentManager();

            $id = intval($fields['id']);
            $user_fk = intval($fields['user_fk']);
            $article_fk = intval($fields['article_fk']);

            $user_fk = $userManager->getUser($user_fk);
            $article_fk = $articleManager->getArticle($article_fk);
            if ($user_fk->getId()) {
                if ($article_fk->getId()) {
                    $comment = new Comment($id);
                    $commentManager->delete($comment);
                }

            }
        }

        $this->render('delete.comment', 'Supprimer un commentaire');
    }
}
<h1>Liste d'article</h1>

<?php

use App\Controller\AbstractController;
use App\Model\Entity\Article;
use App\Model\Entity\Comment;
use App\Model\Manager\CommentManager;

$articles = $data['articles']; ?>

<div id="container-article">
    <div id="article-show"><?php
        foreach ($articles as $article) {
          ?>
            <p class="titleA"><?= $article->getTitle() ?></p>
            <p class="contentA"><?= $article->getContent() ?></p>
            <p class="authorA"><?= $article->getAuthor()->getFirstname() ?></p><?php

            if (AbstractController::verifyRole()) { ?>
                <a href="/index.php?c=article&a=delete-article&id=<?= $article->getId() ?>">Supprimer</a>
            <a href="/index.php?c=article&a=edit-article&id=<?= $article->getId() ?>">Modifier</a><?php
            }?>
            <div id="comment">
                <span id="comments">Commentaires:</span><?php
            foreach (CommentManager::getCommentByArticle($article) as $item) {
                ?>


                <p><?= $item->getContent() ?></p>
                <p class="nameC"><?= $item->getAuthor()->getFirstname() ?></p><?php
                if (AbstractController::verifyRole()) { ?>
                <a href="/index.php?c=comment&a=delete-comment&id=<?= $item->getId() ?>">Supprimer</a><?php
                }
            }

            ?>

            </div>
        <a href="/index.php?c=comment&a=add-comment&id=<?= $article->getId() ?>">Ajouter un commentaire</a>
            <hr>
            <br><?php
        } ?>
    </div>
</div>

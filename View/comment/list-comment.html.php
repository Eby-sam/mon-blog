<?php

use App\Model\Entity\Comment;

$comments = $data['comment'];

foreach ($comments as $comment) {?>
    <p class="comment"><?= $comment->getContent() ?></p>
    <a href="/index.php?c=comment&a=delete-comment&id=<?= $comment->getId() ?>">Supprimer</a><?php
}?>
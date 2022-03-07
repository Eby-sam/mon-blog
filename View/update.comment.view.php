<?php
$id = $_GET['id'];
$manager = new \Model\Manager\CommentManager();
$comment = $manager->getCommentArticle($id);
foreach ($comment as $item) {
    ?>
    <main>
        <a id="previous" href="?controller=articles&id=<?= $item->getArticleFk()->getId()?>&controller2=comments"><i class="fas fa-arrow-left"></i>Retour</a>
        <form class="width_80" method="post" action="">
            <h1 class="colorRed">Modifier un commentaire</h1>
            <label for="title" class="form-label">Titre du commentaire</label>
            <input type="text" class="form-control" id="title" name="title" value="<?=$item->getTitle() ?>" required>
            <label for="contentArticle" class="form-label">Contenu du commentaire</label>
            <textarea id="contentArticle" class="form-control" name="content" required><?=$item->getContent() ?></textarea>
            <input type="hidden" name="date" value="<?=$item->getDate()?>">
            <input type="hidden" name="id" value="<?=$item->getId()?>">
            <input type="hidden" name="user_fk" value="<?=$item->getUserFk()->getId() ?>">
            <input type="hidden" name="article_fk" value="<?=$item->getArticleFk()->getId()?>">
            <input type="submit" id="submit" class="btn btn-danger" value="Modifier l'article">
        </form>
    </main>
    <?php
}
<?php
$id = $_GET['id'];
$manager = new \Model\Manager\CommentManager();
$comment = $manager->getCommentArticle($id);
foreach ($comment as $item) {
    ?>
    <main>
        <a id="previous" href="?controller=articles&id=<?= $item->getArticleFk()->getId()?>&controller2=comments"><i class="fas fa-arrow-left"></i>Retour</a>
        <form class="width_80" method="post" action="">
            <h1 class="colorRed">Voulez vous vraiment supprimer le commentaire "<?=$item->getTitle() ?>" ?</h1>
            <label for="contentArticle" class="form-label">Avec pour contenu :</label>
            <p><?=$item->getContent() ?></p>
            <input type="hidden" name="date" value="<?=$item->getDate()?>">
            <input type="hidden" name="id" value="<?=$item->getId()?>">
            <input type="hidden" name="user_fk" value="<?=$item->getUserFk()->getId() ?>">
            <input type="hidden" name="article_fk" value="<?=$item->getArticleFk()->getId()?>">
            <input type="submit" id="submit" class="btn btn-danger" value="Supprimer le commentaire">
        </form>
    </main>
    <?php
}
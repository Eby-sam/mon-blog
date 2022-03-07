<?php
$id = $_GET['id'];
$manager = new \Model\Manager\ArticleManager();
$article = $manager->getArticle2($id);

foreach ($article as $item) {
    ?>
    <main>
        <a id="previous" href="?controller=articles&id=<?= $id?>&controller2=comments"><i class="fas fa-arrow-left"></i>Retour</a>
        <form class="width_80 flexColumn" method="post" action="">
            <h1 class="colorRed">Voulez vous vraiment supprimer l'article "<?=$item->getTitle() ?>" ?</h1>
            <img src="<?=$item->getPicture() ?>" alt="<?=$item->getTitle() ?>">
            <input type="hidden" name="user_fk" value="<?=$_SESSION['id'] ?>">
            <input type="hidden" name="id" value="<?=$item->getId()?>">
            <input type="submit" id="submit" class="btn btn-danger" value="Supprimer l'article">
        </form>
    </main>

    <?php
}

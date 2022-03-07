<?php
$id = $_GET['id'];
$manager = new \Model\Manager\ArticleManager();
$article = $manager->getArticle2($id);

foreach ($article as $item) {
    ?>
    <main>
        <a id="previous" href="?controller=articles&id=<?= $id?>&controller2=comments"><i class="fas fa-arrow-left"></i>Retour</a>
        <form class="width_80" method="post" action="">
            <h1 class="colorRed">Modifier un article</h1>
            <label for="title" class="form-label">Titre de l'article</label>
            <input type="text" class="form-control" id="title" name="title" value="<?=$item->getTitle() ?>" required>
            <label for="image" class="form-label">Image</label>
            <input type="url" class="form-control" id="image" name="picture" value="<?=$item->getPicture() ?>" required>
            <label for="contentArticle" class="form-label">Contenu de l'article</label>
            <textarea id="contentArticle" class="form-control" name="content" required><?=$item->getContent() ?></textarea>
            <input type="hidden" name="user_fk" value="<?=$_SESSION['id'] ?>">
            <input type="hidden" name="id" value="<?=$item->getId()?>">
            <input type="submit" id="submit" class="btn btn-danger" value="Modifier l'article">
        </form>
    </main>

    <?php
}
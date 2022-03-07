<?php
$id = $_GET['id'];
date_default_timezone_set("Europe/Paris");
?>
<main>
    <a id="previous" href="?controller=articles&id=<?= $id?>&controller2=comments"><i class="fas fa-arrow-left"></i>Retour</a>
    <form class="width_80" action="" method="post">
        <h2 class="colorRed">Poster un commentaire</h2>
        <label for="title" class="form-label">Titre du commentaire *</label>
        <input type="text" class="form-control" id="title" name="title" required>
        <label for="comment" class="form-label">Commentaire *</label>
        <textarea id="comment" class="form-control" name="content" required></textarea>
        <input hidden name="date"  type="text" id="inputDate" value="<?= date('Y-m-d H:i:s')?>">
        <input hidden name="user_fk"  type="text" id="user_fk" value="<?= $_SESSION['id']?>">
        <input hidden name="article_fk" type="text" id="article_fk" value="<?= $id ?>">
        <input type="submit" id="submit" class="btn btn-danger" value="Ajouter le commentaire">
    </form>
</main>
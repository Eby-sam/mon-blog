<?php
$article = $data['article'];
?>

<h1>Modifier l'article</h1>

<div id="form-editArticle">
    <form action="/index.php?c=article&a=edit-article&id=<?= $article->getId() ?>" method="post">
        <div>
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" id="title" value="<?= $article->getTitle() ?>" required>
        </div>
        <div>
            <label for="content"></label>
            <textarea name="content" id="content" cols="30" rows="20" required><?= $article->getContent() ?></textarea>
        </div>

        <input type="submit" name="save" value="Valider" class="save">
    </form>
</div>


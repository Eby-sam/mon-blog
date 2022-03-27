<main>
    <a id="previous" href="?controller=articles"><i class="fas fa-arrow-left"></i>Retour</a>
    <form class="width_80" method="post" action="">
        <h1 class="colorRed">Ajouter un article</h1>
        <label for="title" class="form-label">Titre de l'article</label>
        <input type="text" class="form-control" id="title" name="title" required>
        <label for="image" class="form-label">URL d'une image</label>
        <input type="url" class="form-control" id="image" name="picture" required>
        <label for="contentArticle" class="form-label">Contenu de l'article</label>
        <textarea id="contentArticle" class="form-control" name="content" required></textarea>
        <input type="hidden" name="user_fk" value="<?=$_SESSION['id'] ?>">
        <input type="submit" id="submit" class="btn btn-danger" value="Ajouter l'article">
    </form>
</main>
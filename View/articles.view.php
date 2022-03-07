<main>
    <div id="ArticleHome">
        <?php
        if (isset($var['articles'])) {
            if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                if ($_SESSION["role_fk"] === "1") {
                ?>
                    <div id="divNew">
                        <a class="colorWhite buttonChange" id="newArticle" href="?controller=articles&action=new">Nouveau <i class="fas fa-plus-circle"></i></a>
                    </div>
                <?php
                }
            }
            foreach ($var['articles'] as $article) { ?>
                <a href="?controller=articles&id=<?= $article->getId()?>&controller2=comments" class="articles flexCenter flexColumn">
                    <h2><?= $article->getTitle() ?></h2>
                    <img class="imageArticle" src="<?= $article->getPicture() ?>" alt="<?= $article->getTitle() ?>">
                </a>
        <?php
            }
        }
        ?>
    </div>
</main>
<main>
    <a id="previous" href="?controller=articles"><i class="fas fa-arrow-left"></i>Retour</a>
    <?php
    if (isset($var['articles'])) {
        $id = $_GET['id'];
        $manager = new \Model\Manager\ArticleManager();
        $article = $manager->getArticle2($id);

        foreach ($article as $item) {
            if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                if ($_SESSION["role_fk"] === "1") { ?>
                    <div id="divNew">
                        <a class="colorWhite buttonChange" id="modifyArticle" href="?controller=articles&id=<?= $item->getId() ?>&action=update">Modifier <i class="far fa-edit"></i></a>
                        <a class="colorWhite buttonChange" id="deleteArticle" href="?controller=articles&id=<?= $item->getId() ?>&action=delete">Supprimer <i class="far fa-trash-alt"></i></a>
                    </div>
                    <?php
                }
            }
            ?>
            <div id="article" class="flexColumn flexCenter">
                <h1><?= $item->getTitle()?></h1>
                <img class="imageArticle" src="<?=$item->getPicture() ?>" alt="<?= $item->getTitle()?>">
                <p id="content"><?=$item->getContent()?></p>
            </div>
            <?php
        }
        ?>

        <div class="horizontalLine"></div>

        <div class="flexCenter">
            <a class="colorWhite buttonChange" id="addComment" href="?controller=articles&id=<?= $item->getId() ?>&action=newComment&controller2=comments">Ajouter un commentaire</a>
        </div>

        <div id="comments" class="width_80">
            <h2 class="colorRed">Commentaires</h2>
            <?php
            $commentManager = new \Model\Manager\CommentManager();
            $comment = $commentManager->getCommentsArticle($id);
            foreach ($comment as $item) {

                if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                    if ($_SESSION["role_fk"] === "1") {
                        ?>
                        <a class="colorWhite buttonChangeComment" id="modifyComment" href="?controller=articles&id=<?= $item->getId() ?>&action=updateComment&controller2=comments"><i class="far fa-edit"></i></a>
                        <a class="colorWhite buttonChangeComment" id="deleteComment" href="?controller=articles&id=<?= $item->getId() ?>&action=deleteComment&controller2=comments"><i class="far fa-trash-alt"></i></a>
                        <?php
                    }
                }
                ?>
                <div class="commentArticle">
                    <h3 class="pseudoComment"><?=$item->getUserFk()->getPseudo() ?> - <?=$item->getDate() ?></h3>
                    <h2 class="titleComment"><?=$item->getTitle() ?></h2>
                    <p><?=$item->getContent() ?></p>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>
</main>

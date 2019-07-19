<!-- template head -->
<?php require 'view/include/head.php' ?>
<!-- template header -->
<?php require 'view/include/header.php' ?>

<!-- Content -->
<main>
    <section id="header">
        <img src="<?= $article['lien_image1'] ?>" alt="">
        <h1 class="chap-image">CHAPITRE <?= ($article['id']) ?><br>Billet simple pour l'Alaska</h1>
    </section>

    <section>
        <p><?= $article['content'] ?></p>
    </section>

    <section>
        <h2>COMMENTAIRES</h2>
        <p>Pour déposer un commentaire, vous devez être connecté</p>
        <div class="commentaires">
            <div class="form-chap">
                <form id="form" action="">
                    <div class="row">
                        <input class="btn light" type="submit" value="Connexion">
                        <input class="btn" type="submit" value="Inscription">
                    </div>
                </form>
            </div>
            <div class="comments">

                <?php
                if (!empty($comments)) {
                    foreach ($comments as $index => $comment) : ?>
                        <div class="comment">
                            <?= str_secur($comment['id']) ?>
                            Le: <?= date_format(date_create($comment['date_post']), "d/m/Y H:i") ?>
                            <input class="btn" type="submit" value="Signaler">
                            <p><?= str_secur($comment['post']) ?></p>
                        </div>
                    <?php endforeach;
                } else {
                    echo "Pas de commentaires";
                } ?>
            </div>
        </div>

    </section>

</main>
<!-- template footer -->
<?php require 'view/include/footer.php' ?>
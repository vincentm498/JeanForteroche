<?php
require 'view/include/head.php';
require 'view/include/header.php';

?>

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

        <!-- FORMULAIRE INSCRIPTION -->
        <?php

        if (!isset($_SESSION['membreID'])) {
            ?>

            <div class="selection">
                <p>Vous devez vous connectez pour écrire votre message </p>
                <a class="btn" href="index.php?action=inscription&amp;id=<?= $article['id'] ?>">Inscription</a>
                <a class="btn" href="index.php?action=connexion&amp;id=<?= $article['id'] ?>">Connexion</a>
            </div>

        <?php } else { ?>
            <div class="selection"></div>
            <p>Bienvenue laissez votre message </p>
            </div>
            <!-- FORMULAIRE MESSAGE -->
            <form id="form" action="index.php?action=addComment&amp;id=<?= $article['id'] ?>" method="post">
                <div class="row">
                    <textarea id="comment" name="comment"></textarea>
                    <input class="btn" type="submit" value="Envoyer">
                </div>

            </form>
        <?php }; ?>

        <div class="commentaires">

            <div class="comments">

                <?php
                if (!empty($comments)) {
                    foreach ($comments as $index => $comment) : ?>
                        <div class="comment">
                            <?= $comment['pseudo'] ?>
                            Le: <?= date_format(date_create($comment['date_post']), "d/m/Y H:i") ?>

                            <a href="index.php?action=reportComment"><i class="fas fa-exclamation-circle"></i></a>
                            <p><?= $comment['post'] ?></p>
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
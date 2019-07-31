<?php
require 'view/include/head.php';
require 'view/include/header.php';
session_start();

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
        <p>Pour déposer un commentaire, vous devez être connecté</p>
        <div class="commentaires">

            <div class="form-chap">

                <!-- FORMULAIRE INSCRIPTION -->
                <form id="form" action="index.php?action=addMember&amp;id=<?= $article['id'] ?>" method="post">
                    <div class="row">
                        <input type="text" name="pseudo" id="pseudo" placeholder="Votre peudo">
                        <input type="email" name="email" id="email" placeholder="Votre email">
                        <input type="password" name="pass" id="pass" placeholder="Mots de passe">
                        <input type="password" name="verification_pass" id="verification_pass" placeholder="Confirmation du mot de passe">
                        <input class="btn light" name="envoi" type="submit" value="Inscription">
                    </div>
                    <div class="row error">
                        <?php

                        echo $_SESSION['flash']['message'];
                        ?>
                    </div>
                </form>


                <!-- FORMULAIRE MESSAGE -->
                <!-- <form id="form" action="index.php?action=addComment&amp;id=<?= $article['id'] ?>" method="post">
                    <div class="row">
                        <input type="text" id="member" name="member" />
                        <textarea id="comment" name="comment"></textarea>
                        <input class="btn" type="submit" value="Envoyer">
                    </div>
                </form> -->
            </div>
            <div class="comments">

                <?php
                if (!empty($comments)) {
                    foreach ($comments as $index => $comment) : ?>
                        <div class="comment">
                            <?= str_secur($comment['pseudo']) ?>
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
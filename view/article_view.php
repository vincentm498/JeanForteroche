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
            <?php ?>
            <div class="form-chap">
                <!-- FORMULAIRE CONNEXION -->
                <form id="form" action="index.php?action=addMember&amp;id=<?= $article['id'] ?>" method="post">
                    <div class="row">
                        <input type="text" name="firstname" id="firstname" placeholder="Votre peudo">
                        <input type="password" name="password" id="password" placeholder="Mots de passe">
                        <input type="email" name="email" id="email" placeholder="Votre email">
                        <input class="btn light" type="submit" value="Connexion">
                        <!-- <label for="inscription">Pas encore inscrit?</label>
                        <input class="btn" name="inscription" type="submit" value="Inscription"> -->
                    </div>
                </form>
                <!-- FORMULAIRE MESSAGE -->
                <!-- <form id="form" index.php?action=addComment&amp;id=<?= $article['id'] ?>" method="post">
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
                            <?= str_secur($comment['firstname']) ?>
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
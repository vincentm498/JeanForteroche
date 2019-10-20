<!-- template head -->
<?php require 'view/include/head.php' ?>

<body id="back-office">

    <?php require 'view/include/header-back.php' ?>

    <main>
        <nav>
            <ul>
                <li>
                    <a href="index.php?action=back"><i class="far fa-list-alt"></i>Tableau de bord</a>
                </li>
                <li>
                    <a href="index.php?action=backArticles"><i class="far fa-file-alt"></i>Articles</a>
                </li>
            </ul>
        </nav>
        <div class="conteneur">
            <div class="conteneur bloc">
                <h2>Mes articles </h2>
                <a href="index.php?action=backArticles">Voir tous les articles</a>
                <a href="index.php?action=AddArticles">Créer&nbspun&nbsparticle </a>
            </div>

            <div class="conteneur bloc">
                <h2>Les commentaires</h2>
                <h3>Les commentaires à modérer</h3>
                <ul>
                    <?php
                    foreach ($comments as $index => $comment) : ?>
                        <li class="commentaires impaire">
                            <div class="contenuCommentaire">
                                <h4><?= $comment['pseudo'] ?></h4>
                                <p><?= $comment['post'] ?></p>
                                <p>Posté le: <span><?= date_format(date_create($comment['date_post']), "d/m/Y H:i") ?></span> </p>
                            </div>
                            <div class="boutonModeration">
                                <a href="index.php?action=signalValideComment&amp;id=<?= $comment['id_post'] ?>"><i class="far fa-check-circle"></i></a>
                                <a href="index.php?action=signalRefusComment&amp;id=<?= $comment['id_post'] ?>"><i class="far fa-times-circle"></i></a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </main>
</body>
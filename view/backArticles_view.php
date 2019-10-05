<!-- template head -->
<?php require 'view/include/head.php' ?>

<body id="back-office">
    <header>
        <div class="barreTop">
            <div class="conteneur">
                Bienvenue sur votre espace: <span class="user">Admin</span>
            </div>
            <div class="conteneur">
                <a href="index.php">Retour au site</a>
                <button>Se déconnecter</button>
            </div>
        </div>

    </header>

    <main>
        <nav>
            <ul>
                <li>
                    <a href="index.php?action=back"><i class="far fa-list-alt"></i>Tableau de bord</a>
                </li>
                <li>
                    <a href="index.php?action=backArticles"><i class="far fa-file-alt"></i>Articles</a>
                </li>
                <li>
                    <a href="back-commentaires.html"><i class="far fa-comment"></i>Commentaires</a>
                </li>
            </ul>
        </nav>
        <div class="conteneur">
            <div class="conteneur bloc">
                <h2>Mes articles </h2>
                <a href="index.php?action=AddArticles">Créer un article </a>
                <ul>
                    <?php foreach ($articles as $article) : ?>
                        <li class="commentaires impaire">
                            <div class="contenuCommentaire">
                                <div class="flex">
                                    <h4><?= $article['title'] ?></h4>
                                    <p>Créé le: <span><?= $article['date_post'] ?></span> </p>
                                </div>
                                <div class="lien-article">
                                    <a href="index.php?action=article&id=<?= $article['id'] ?>" target="_blank">Voir l'article</a>
                                    <a href="http://">Modifier</a>
                                    <!-- <a href="#" onclick="changeLink()" id="supprimer">Supprimer</a> -->
                                    <a href="index.php?action=DeleteArticles&id=<?= $article['id'] ?>" id="supprimer">Supprimer</a>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>


        </div>

    </main>

</body>
<!-- template head -->
<?php require 'view/include/head.php' ?>

<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>

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
            <div class="conteneur">
                <div class="conteneur ">
                    <h2>Modifier l'article</h2>

                    <form action="index.php?action=updateArticle&amp;id=<?= $article['id'] ?>" id="form-article" method="post" enctype="multipart/form-data">

                        <h3>Titre de l'article</h3>
                        <input type="text" id="title" name="title" value="<?php echo $article['title'] ?>">
                        <h3>Image de l'article</h3>
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                        <h3>Résumé de l'article</h3>
                        <textarea name="sentence" id="resume" cols="30" rows="10"><?php echo $article['sentence'] ?></textarea>
                        <h3>Contenu de l'article</h3>
                        <textarea name="content" id="contenu" cols="30" rows="10"><?php echo $article['content'] ?></textarea>
                        <input type="submit" value="Envoyer">
                    </form>
                </div>
            </div>

            <?php if (1 == 2) { ?>

                <div class="conteneur">
                    <h2>Commentaires validés de l'article</h2>
                    <ul>
                        <?php
                            foreach ($comments as $index => $comment) : ?>
                            <li class="commentaires impaire">
                                <div class="contenuCommentaire">
                                    <h4>members_id<?= $comment['members_id'] ?></h4>
                                    <p><?= $comment['post'] ?></p>
                                    <p>Posté le: <span><?= date_format(date_create($comment['date_post']), "d/m/Y H:i") ?></span> </p>
                                </div>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            <?php } ?>
        </div>
    </main>

</body>
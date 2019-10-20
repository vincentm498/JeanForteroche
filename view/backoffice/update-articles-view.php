<!-- template head -->
<?php require 'view/include/head.php' ?>

<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>

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
            <div class="conteneur">
                <div class="conteneur ">
                    <h2>Modifier l'article</h2>
                    <form action="index.php?action=updateArticle&amp;id=<?= $article['id'] ?>" id="form-article" method="post" enctype="multipart/form-data">
                        <h3>Titre de l'article</h3>
                        <input type="text" id="title" name="title" value="<?php echo $article['title'] ?>">
                        <h3>Image de l'article</h3>
                        <div><img src="<?php echo $article['lien_image1'] ?>" alt="" width="150px"></div>
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                        <input type="file" id="image" name="userfile" accept="image/png, image/jpeg">
                        <h3>Résumé de l'article</h3>
                        <textarea name="sentence" id="resume" cols="30" rows="10"><?php echo $article['sentence'] ?></textarea>
                        <h3>Contenu de l'article</h3>
                        <textarea name="content" id="contenu" cols="30" rows="10"><?php echo $article['content'] ?></textarea>
                        <input name="envoi" type="submit" value="Envoyer">
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
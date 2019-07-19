<!-- template head -->
<?php require 'view/include/head.php' ?>
<!-- template header -->
<?php require 'view/include/header.php' ?>

<!-- Content -->
<main>

    <section id="header">
        <h1>Billet simple <br>
            pour l'Alaska</h1>
    </section>

    <?php foreach ($tests as $article) : ?>
        <section id="roman" class="chapitre">
            <div class="conteneur-full">
                <div class="conteneur-full-text">
                    <h2>
                        Chapitre <?= $article['id'] ?><br>
                        <span><?= $article['title'] ?></span>
                    </h2>
                    <div class="conteneur-full-conteneur-text">
                        <p><?= $article['sentence'] ?></p>
                    </div>
                    <a class="btn" href="index.php?action=article&amp;id=<?= $article['id'] ?>">Lire...</a>
                </div>
                <div class="conteneur-full-image">
                    <img src="<?= $article['lien_image1'] ?>" alt="">
                </div>
            </div>
        </section>
    <?php endforeach; ?>



</main>
<!-- template footer -->
<?php require 'view/include/footer.php' ?>
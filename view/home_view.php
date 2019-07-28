<!-- template head -->
<?php require 'view/include/head.php' ?>
<!-- template header -->
<?php require 'view/include/header.php' ?>
<!-- Content -->
<main>
    <section id="header">
        <h1>Jean Forteroche</h1>
        <h2>Billet simple pour l'Alaska</h2>
    </section>

    <section id="sub-header">
        <?php foreach ($lastArticles as $lastArticle) : ?>
            <div class="chapitre">
                <div class="conteneur text">
                    <h3><?= $lastArticle['title'] ?></h3>
                    <span><?= date_format(date_create($lastArticle['date']), "d/m/Y H:i") ?></span>
                    <p><?= $lastArticle['content'] ?></p>
                    <a class="btn" href="index.php?action=article&amp;id=<?= $lastArticle['id'] ?>">Lire ...</a>
                </div>
                <div class="conteneur image">
                    <img src="<?= $lastArticle['lien_image1'] ?>" alt="">
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <section id="roman">
        <div class="conteneur-full">
            <div class="conteneur-full-text">
                <h2>Résumé du roman <br><span>Billet simple pour l'Alaska</span></h2>
                <div class="conteneur-full-conteneur-text">
                    <p>LLorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc mihi cum tuo fratre convenit. Tuo vero id quidem, inquam, arbitratu. Ac tamen hic mallet non dolere. De hominibus dici non necesse est.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cur post Tarentum ad Archytam? Si quae forte-possumus. Certe, nisi voluptatem tanti aestimaretis. </p>
                </div>
                <a class="btn" href="index.php?action=allArticle">Voir tous les chapitres</a>
            </div>
            <div class="conteneur-full-image">

            </div>
        </div>
    </section>

    <section id="author">
        <div class="conteneur-1200">
            <div class="conteneur-1200-image">
            </div>
            <div class="conteneur-1200-text">
                <h2>Jean Forteroche</h2>
                <p>LLorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc mihi cum tuo fratre convenit. Tuo vero id quidem, inquam, arbitratu. Ac tamen hic mallet non dolere. De hominibus dici non necesse est.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cur post Tarentum ad Archytam? Si quae forte-possumus. Certe, nisi voluptatem tanti aestimaretis. </p>
            </div>
        </div>
    </section>



</main>
<!-- template footer -->
<?php require 'view/include/footer.php' ?>
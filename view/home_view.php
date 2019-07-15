<!-- template head -->
<?php require 'view/include/head.php'?>
<!-- template header -->
<?php require 'view/include/header.php'?>

<!-- Content -->
<main>
        <section id="header">
            <h1>Jean Forteroche</h1>
            <h2>Billet simple pour l'Alaska</h2>
        </section>

        <section id="sub-header">
            <?php foreach ($lastArticles as $lastArticle) {?>
            <div class="chapitre">
                <div class="conteneur text">
                    <h3><?=$lastArticle['title']?></h3>
                    <span><?=date_format(date_create($lastArticle['date']), "d/m/Y H:i")?></span>
                    <p><?=$lastArticle['content']?></p>
                    <a class="btn" href="index.php?action=article&amp;id=<?=$lastArticle['id']?>">Lire ...</a>
                </div>
                <div class="conteneur image">
                    <img src="<?=$lastArticle['lien_image1']?>" alt="">
                </div>
            </div>
            <?php }?>
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

        <section id="roman">
            <div class="conteneur-full">
                <div class="conteneur-full-text">
                    <h2>Résumé du roman <br><span>Billet simple pour l'Alaska</span></h2>
                    <div class="conteneur-full-conteneur-text">
                        <p>LLorem ipsum dolor sit amet, consectetur adipiscing elit. Hoc mihi cum tuo fratre convenit. Tuo vero id quidem, inquam, arbitratu. Ac tamen hic mallet non dolere. De hominibus dici non necesse est.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cur post Tarentum ad Archytam? Si quae forte-possumus. Certe, nisi voluptatem tanti aestimaretis. </p>
                    </div>
                    <a class="btn" href="index.php?page=roman">Voir tous les chapitres</a>
                </div>
                <div class="conteneur-full-image">

                </div>
            </div>
        </section>

        <section id="contact">
            <div class="conteneur-1200">
                <h2>Contact</h2>
                <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Quod quidem iam fit etiam in Academia.</h3>
                <form id="form" action="">
                    <div class="row">
                        <input class="col-left" id="name" type="text" name="name" placeholder="Nom">
                        <input class="col-right" id="firstname" type="text" name="firstname" placeholder="Prénom">
                    </div>
                    <div class="row">
                        <input class="col-left" id="email" type="text" name="email" placeholder="E-mail">
                        <input class="col-right" id="subject" type="text" name="subject" placeholder="Sujet">
                    </div>
                    <div class="row">
                        <textarea id="message" name="message" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    <div class="form-send">
                        <input type="checkbox" id="checkbox" name="checkbox">
                        <label for="checkbox">En soumettant ce formulaire, j'accepte que les données personnelles saisies soient utilisées dans le cadre de ma demande d'information.</label>
                    </div>
                    <input class="btn" type="submit" value="Envoyer">
                </form>
            </div>
        </section>
</main>
<!-- template footer -->
<?php require 'view/include/footer.php'?>




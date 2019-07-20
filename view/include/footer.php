<footer>
    <div class="brand"></div>
    <div class="menu-footer">
        <div class="category-footer">
            <h5>Chapitres</h5>
            <ul>
                <?php foreach ($articles as $article) : ?>
                    <li><a class="link-footer" href="index.php?action=article&amp;id=<?= $article['id'] ?>"><?= $article['title'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="category-footer">
            <h5>Navigation</h5>
            <ul>
                <li><a class="link-footer" href="index.php?page=home#header">Accueil</a></li>
                <li><a class="link-footer" href="index.php?page=home#author">Qui suis-je</a></li>
                <li><a class="link-footer" href="index.php?page=#roman">Roman</a></li>
                <li><a class="link-footer" href="#">Administration</a></li>
            </ul>
        </div>
        <div class="category-footer">
            <h5>Suivez-moi</h5>
            <a class="link-footer" href="#"><i class="fab fa-facebook-f fa-2x"></i></a>
            <a class="link-footer" href="#"><i class="fab fa-twitter fa-2x"></i></a>
            <a class="link-footer" href="#"><i class="fab fa-linkedin-in fa-2x"></i></a>
        </div>
        <div class="credits">
            © 2019 JeanForteroche.fr - <a href="index.php?action=mentions">Mentions légales</a>
        </div>
    </div>

</footer>
</body>

</html>
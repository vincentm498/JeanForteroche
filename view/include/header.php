<body>
    <header>
        <div id="menu">
            <div class="brand">
                <a class="link-menu" href="index.php?page=home#header"></a>
            </div>

            <input id="menu-checkbox" type="checkbox" class="menuHamburger">
            <label for="menu-checkbox" class="menu-toggle"><i class="fas fa-bars fa-2x"></i></label>
            <nav class="menu">
                <a class="link-menu" href="index.php?page=home#header">Accueil</a>
                <a class="link-menu" href="index.php?action=allArticle">Roman</a>
                <a class="link-menu" href="index.php?page=home#author">Qui suis-je</a>
                <!-- <a class="btn" href="index.php?action=connexion">Connexion</a> -->
                <?php
                if (isset($_SESSION['membreID'])) { ?>
                    <a class="btn" href="index.php?action=deconnexion">Me déconnecter</a>
                <?php } ?>
                <a class="icone" href="#"><i class="far fa-user-circle fa-2x"></i></a>

                <?php
                if (!empty($_SESSION['flash'])) {;
                    $color = $_SESSION['flash']['color'] . '-text'; ?>
                    <script>
                        M.toast({
                            html: "<i class='material-icons left <?= $color ?> '>label</i>" + "<?= $_SESSION['flash']['message'] ?>"
                        })
                    </script>
                <?php unset($_SESSION['flash']['message']);
                }
                ?>

            </nav>
        </div>

    </header>
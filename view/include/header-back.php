<body>
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

    </header>
<!-- template head -->
<?php require 'view/include/head.php' ?>
<!-- template header -->
<?php require 'view/include/header.php' ?>
<!-- Content -->
<!-- FORMULAIRE CONNEXION -->
<form class="connexionInscription" id="form" action="index.php?action=verifMember" method="post">
    <div class="row">

        <input type="email" name="email" id="email" placeholder="Votre email">
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
        <input type="password" name="pass" id="pass" placeholder="Mots de passe">
        <input class="btn light" name="envoi" type="submit" value="Connexion">
        <p>Pas de compte <a href="index.php?action=inscription&amp;id=<?= $_GET['id'] ?>">inscription</a> </p>
    </div>
</form>
<!-- template footer -->
<?php require 'view/include/footer.php' ?>
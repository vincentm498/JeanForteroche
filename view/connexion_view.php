<!-- template head -->
<?php require 'view/include/head.php' ?>
<!-- template header -->
<?php require 'view/include/header.php' ?>
<!-- Content -->
<!-- FORMULAIRE CONNEXION -->
<form id="form" action="" method="post">
    <div class="row">
        <input type="text" name="pseudo" id="pseudo" placeholder="Votre peudo">
        <input type="email" name="email" id="email" placeholder="Votre email">
        <input type="password" name="pass" id="pass" placeholder="Mots de passe">
        <input type="password" name="verification_pass" id="verification_pass" placeholder="Confirmation du mot de passe">
        <input class="btn light" name="envoi" type="submit" value="Connexion">
    </div>
</form>
<!-- template footer -->
<?php require 'view/include/footer.php' ?>
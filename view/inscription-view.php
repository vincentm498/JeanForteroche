<?php require 'view/include/head.php';
require 'view/include/header.php' ?>


<!-- FORMULAIRE INSCRIPTION -->
<form class="connexionInscription" id="form" action="index.php?action=addMember" method="post">
    <div class="row">
        <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo">
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
        <input type="email" name="email" id="email" placeholder="Votre email">
        <input type="password" name="pass" id="pass" placeholder="Mots de passe">
        <input type="password" name="verification_pass" id="verification_pass" placeholder="Confirmation du mot de passe">
        <input class="btn light" name="envoi" type="submit" value="Inscription">
    </div>
</form>

<?php require 'view/include/footer.php' ?>
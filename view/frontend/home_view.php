<?php ob_start(); ?>

<section id="header">
    <h1><span>Jean</span> <br>Forteroche</h1>
    <h2>Billet simple pour l'Alaska</h2>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

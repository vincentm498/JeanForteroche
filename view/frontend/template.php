<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="public/css/styles.css" rel="stylesheet" /> 
    </head>
    <?php require('include/header.php'); ?>
        
    <body>
        <?= $content ?>
    </body>
    <?php require('include/footer.php'); ?>
</html>
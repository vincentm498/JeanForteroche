<?php

// Chargement des classes
require_once('class/Members.php');

function addMember($articleId, $pseudo, $pass_hache, $email, $error)
{
    $commentsModel = new Members();

    if (isset($_POST['envoi'])) { // si formulaire soumis

        $pseudo = str_secur($_POST['pseudo']);
        $pass = str_secur($_POST['pass']);
        $email = str_secur($_POST['email']);
        $verification_pass = str_secur($_POST['verification_pass']);

        // on teste la déclaration de nos variables
        if (!empty($pseudo) &&  !empty($pass) &&  !empty($email) &&  !empty($verification_pass)) {

            // Test de la correspondance du mots de passe
            if ($pass == $verification_pass) {

                //Test de la validité de l'email
                if (filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_PATH_REQUIRED)) {

                    //Test du membre déjà ajouté
                    $pseudo_verif = $commentsModel->getMemberInscription($pseudo, $email);

                    if (count($pseudo_verif) == 0) {

                        // Hachage du mot de passe
                        $pass_hache = password_hash($pass, PASSWORD_DEFAULT);

                        $addMember = $commentsModel->addMember($pseudo, $pass_hache, $email);
                        $error = "Votre compte à été créé";
                        header('Location: index.php?action=article&id=' . $articleId . '&message=' . $error);
                    } else {
                        $error = "Pseudo ou mail déja utilisés";
                        header('Location: index.php?action=article&id=' . $articleId . '&message=' . $error);
                    }
                } else {
                    $error = "Votre email n'est pas correct";
                    header('Location: index.php?action=article&id=' . $articleId . '&message=' . $error);
                }
            } else {
                $error = "Le mots de passe n'est pas identique";
                header('Location: index.php?action=article&id=' . $articleId . '&message=' . $error);
            }
        } else {
            $error = "Le formulaire n'est pas correctement rempli";
            header('Location: index.php?action=article&id=' . $articleId . '&message=' . $error);
        }
    }
}

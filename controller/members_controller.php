<?php

namespace JeanForteroche\controller;

use JeanForteroche\controller\Controller_controller;
use JeanForteroche\model\Members;
use JeanForteroche\model\Session;


class Members_controller extends Controller_controller
{

    public function member($articleId, $pseudo, $pass_hache, $email)
    {
        $commentsModel = new Members();
        $session = new Session(); //Lance la session

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
                        // $pseudo_verif = $commentsModel->getMemberInscription($pseudo, $email);

                        //if (count($pseudo_verif) == 0) {
                        if (1 == 1) {
                            // Hachage du mot de passe
                            $pass_hache = password_hash($pass, PASSWORD_DEFAULT);

                            $addMember = $commentsModel->addMember($pseudo, $pass_hache, $email);
                            $session->setFlash("Votre compte a été créé avec succès", 'green');
                            // header('Location: index.php?action=article&id=' . $articleId);
                        } else {
                            $session->setFlash("Pseudo ou mail déja utilisés", 'red');
                            header('Location: index.php?action=article&id=' . $articleId);
                        }
                    } else {
                        $session->setFlash("Votre email n'est pas correct", 'red');
                        header('Location: index.php?action=article&id=' . $articleId);
                    }
                } else {
                    $session->setFlash("Le mots de passe n'est pas identique", 'red');
                    header('Location: index.php?action=article&id=' . $articleId);
                }
            } else {
                $session->setFlash("Veuillez remplir tous les champs", 'red');
                header('Location: index.php?action=article&id=' . $articleId);
            }
        }
    }
}

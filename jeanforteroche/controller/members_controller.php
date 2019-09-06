<?php

namespace JeanForteroche\controller;

// use JeanForteroche\model\Session;
use JeanForteroche\model\Members;
use JeanForteroche\model\Articles;

class Members_controller extends Controller
{

    // Ajout d'un nouveau membre
    public function addMember($articleId, $pseudo, $pass_hache, $email)
    {
        $commentsModel = new Members();

        if (isset($_POST['envoi'])) { // si formulaire soumis

            $pseudo = htmlspecialchars($_POST['pseudo']);
            $pass = htmlspecialchars($_POST['pass']);
            $email = htmlspecialchars($_POST['email']);
            $verification_pass = htmlspecialchars($_POST['verification_pass']);

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
                            $this->setFlash("Votre compte a été créé avec succès", 'green');

                            // $_SESSION['membreID'] = "1";
                            $_SESSION['prenom'] = $_POST['pseudo'];
                            $_SESSION['email'] = $_POST['email'];
                            $_SESSION['pass'] = $_POST['verification_pass'];

                            header('Location: index.php?action=article&id=' . $articleId);
                        } else {
                            $this->setFlash("Pseudo ou mail déja utilisés", 'red');
                            header('Location: index.php?action=article&id=' . $articleId);
                        }
                    } else {
                        $this->setFlash("Votre email n'est pas correct", 'red');
                        header('Location: index.php?action=article&id=' . $articleId);
                    }
                } else {
                    $this->setFlash("Le mots de passe n'est pas identique", 'red');
                    header('Location: index.php?action=article&id=' . $articleId);
                }
            } else {
                $this->setFlash("Veuillez remplir tous les champs", 'red');
                header('Location: index.php?action=article&id=' . $articleId);
            }
        }
    }

    // Deconnection de membre
    public function deconnexion()
    {
        // Détruit toutes les variables de session
        $_SESSION = array();
        print_r($_SESSION);
        header('Location: index.php');
    }

    // Connection de membre
    public function connexion()
    {

        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();
        // Affichage
        require 'view/connexion_view.php';
    }
}

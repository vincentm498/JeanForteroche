<?php

namespace JeanForteroche\controller;

// use JeanForteroche\model\Session;
use JeanForteroche\model\Members;
use JeanForteroche\model\Articles;

class MembersController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    // Ajout d'un nouveau membre
    public function addMember()
    {
        $commentsModel = new Members();

        if (isset($_POST['envoi'])) { // si formulaire soumis

            $pseudo = trim(htmlspecialchars($_POST['pseudo']));
            $pass = trim(htmlspecialchars($_POST['pass']));
            $email = trim(htmlspecialchars($_POST['email']));
            $verification_pass = trim(htmlspecialchars($_POST['verification_pass']));
            $articleId = 0;
            if (isset($_POST['id'])) {
                $articleId = $_POST['id'];
            }
            if ($articleId == 0) {
                $url = 'index.php?action=inscription';
            } else {
                $url = 'index.php?action=inscription&id=' . $articleId;
            }

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

                            $url = 'index.php?action=article&id=' . $articleId;
                            $addMember = $commentsModel->addMember($pseudo, $pass_hache, $email);
                            $this->setFlash("Votre compte a été créé avec succès", 'green');


                            $_SESSION['membreID'] = $addMember;
                        } else {
                            $this->setFlash("Pseudo ou mail déja utilisés", 'red');
                        }
                    } else {
                        $this->setFlash("Votre email n'est pas correct", 'red');
                    }
                } else {
                    $this->setFlash("Le mots de passe n'est pas identique", 'red');
                }
            } else {
                $this->setFlash("Veuillez remplir tous les champs", 'red');
            }
            header('Location: ' . $url);
        }
    }

    // Deconnection de membre
    public function deconnexion()
    {
        // Détruit toutes les variables de session
        $_SESSION = array();
        header('Location: index.php');
    }

    // Page Connection de membre
    public function connexion()
    {

        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        // Affichage
        require 'view/connexion-view.php';
    }

    // Page Inscription de membre
    public function inscription()
    {
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        // Affichage
        require 'view/inscription-view.php';
    }

    public function verifMember()
    {
        $verifMember = new Members();

        $email = trim(htmlspecialchars($_POST['email']));
        $password = trim(htmlspecialchars($_POST['pass']));
        $articleId = 0;
        $url = 'index.php?action=connexion';

        if (isset($_POST['id'])) {
            $articleId = $_POST['id'];
            $url = 'index.php?action=connexion&id=' . $articleId;
        }


        if (!empty($email) &&  !empty($password) && isset($_POST['envoi'])) {

            $verifMember = $verifMember->getMemberConnexion($email);

            if ($verifMember !== FALSE) {

                if (password_verify($password, $verifMember['pass'])) {

                    // Connexion
                    if ($verifMember['id_groupe'] == 1) {
                        $url = 'index.php?action=back';
                    } elseif ($articleId == 0) {
                        $url = 'index.php';
                    } else {
                        $url = 'index.php?action=article&id=' . $articleId;
                    }

                    $_SESSION['membreID'] = $verifMember['id'];
                    $_SESSION['membreGroupe'] = $verifMember['id_groupe'];
                    $_SESSION['membrePseudo'] = $verifMember['pseudo'];

                    $this->setFlash("Connecté", 'green');
                } else {
                    $this->setFlash("Email ou mot de passe incorrect", 'red');
                }
            } else {
                $this->setFlash("Identifiant incorrect", 'red');
            }
        } else {
            $this->setFlash("Veuillez remplir tous les champs", 'red');
        }

        header('Location: ' . $url);
    }
}

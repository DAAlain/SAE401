<?php
require_once 'modele/contact.class.php';

class ctlContact
{
    private $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }

    public function processForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Validation des données
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['mail']);
                $sujet = htmlspecialchars($_POST['sujet']);
                $message = htmlspecialchars($_POST['message']);

                // Vérification des champs requis
                if (empty($nom) || empty($prenom) || empty($email) || empty($sujet) || empty($message)) {
                    throw new Exception("Tous les champs sont obligatoires");
                }

                // Vérification du format email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("Format d'email invalide");
                }

                // Sauvegarde dans la base de données
                $this->contact->saveMessage($nom, $prenom, $email, $sujet, $message);

                // Message de succès
                return "Votre message a été envoyé avec succès !";
            } catch (Exception $e) {
                return "Erreur : " . $e->getMessage();
            }
        }
        return null;
    }
}

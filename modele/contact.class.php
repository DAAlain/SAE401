<?php
require_once 'database.class.php';
class Contact extends database
{
    public function saveMessage($nom, $prenom, $email, $sujet, $message)
    {
        $req = "INSERT INTO contact_messages (nom, prenom, email, sujet, message) 
                VALUES (:nom, :prenom, :email, :sujet, :message)";

        $data = array(
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':sujet' => $sujet,
            ':message' => $message
        );

        try {
            return $this->execReqPrep($req, $data);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de l'enregistrement du message : " . $e->getMessage());
        }
    }
}

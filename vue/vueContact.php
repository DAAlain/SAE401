<?php require_once 'includes/formulaire.class.php';
require_once 'controleur/ctlcontact.class.php';
$title = "Contact - WE ESCAPE";
$ctlContact = new ctlContact();
$message = $ctlContact->processForm();
?>
<div class="contact-container">
    <div class="background-lines2">
        <img src="images/img/background_rayure.webp" alt="background" loading="lazy">
    </div>
    <div class="contact-content">
        <h2 class="contact-title" data-translate="contacter">Contactez-nous</h2>
        <?php if ($message): ?>
            <div class="message <?php echo strpos($message, 'Erreur') !== false ? 'error' : 'success'; ?>" id="notification">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form class="contact-form" action="index.php?action=contact" method="POST">
            <?php $form = new Formulaire(); ?>
            <div class="form-row">
                <?php
                echo $form->inputTextcontact('nom', 'NOM',   'nom-contact');
                echo $form->inputTextcontact('prenom', 'PRÉNOM', 'prenom-contact');
                ?>
            </div>
            <?php
            echo $form->inputTextcontact('mail', 'MAIL', 'mail-contact');
            echo $form->inputTextcontact('sujet', 'SUJET', 'sujet-contact');
            echo $form->inputTextAreacontact('message', 'VOTRE MESSAGE', 'message-contact');
            ?>
            <?php
            echo $form->submitcontact('submit', 'envoyer-contact');
            ?>
        </form>
    </div>
</div>

<!-- Ajout du script pour faire disparaître le message après 5 secondes -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.getElementById('notification');
        if (notification) {
            setTimeout(function() {
                notification.classList.add('fade-out');
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 300);
            }, 5000);
        }
    });
</script>
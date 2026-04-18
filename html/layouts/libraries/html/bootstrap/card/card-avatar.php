<div class="col-lg-4">
<div class="card card-bg card-avatar rounded mb-3">
<div class="card-body">

<?php
// Inizializza l'ambiente Joomla per accedere ai dati utente
defined('_JEXEC') or die;

use Joomla\Component\Fields\Administrator\Helper\FieldsHelper;

// Carica l'oggetto utente
$user = JFactory::getUser($persona);

// Verifica se l'utente esiste
if (!$user->id) {
    echo 'Utente non trovato.';
} else {
    $fields = FieldsHelper::getFields('com_users.user', $user, true);
    $profileImageField = null;
    foreach ($fields as $field) {
        if ($field->name == 'profile') {
            $profileImageField = $field;
            break;
        }
    }


    if ($customEmail){
        $mailOut = $customEmail;

    } else {
        $mailOut = htmlspecialchars($user->email);}


    // Verifica se l'immagine del profilo è presente
    if ($profileImageField && !empty($profileImageField->value)) {
        // Mostra l'immagine del profilo
        $immagineProfilo = $profileImageField->value; // Percorso dell'immagine
    } else {
        // Immagine non trovata, puoi mostrare un'immagine predefinita
        $immagineProfilo = '<div class="avatar size-lg"><img src="bootstrap-italia/assets/placeholders/img-avatar-250x250.png" alt="Immagine profilo">
        <span class="visually-hidden">Immagine profilo</span> </div>';
    }


    // Sostituisci i segnaposto con i dati dell'utente, gestendo valori vuoti
    echo '<div class="avatar size-lg">'. $immagineProfilo.'</div>';
    echo '<div class="ms-3 card-avatar-content">';
     if ($ruolo){ echo '<small>'.$ruolo.'</small>'; }
    echo '<p class="text-underline"><a href="mailto:'.$mailOut.'">'.htmlspecialchars($user->name).'</a></p><small>'.$mailOut.'</small></div>';
    $customEmail='0';
  $ruolo='0';

}
?>
</div>
</div>
</div>

















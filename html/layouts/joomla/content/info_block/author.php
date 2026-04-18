<?php
/**
 * Override layout autore con avatar
 * Joomla 5/6 – Bootstrap Italia
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\Component\Fields\Administrator\Helper\FieldsHelper;

// Sicurezza sui dati in ingresso
if (empty($displayData['item'])) {
    return;
}

$item   = $displayData['item'];
$params = $displayData['params'] ?? null;

// Utente autore
$userId = (int) $item->created_by;
$user   = Factory::getUser($userId);

// Nome autore: alias > nome reale
$authorName = $item->created_by_alias ?: $item->author;

// Link autore (pagina contatto)
$linkAuthor = !empty($item->contact_link) && $params && $params->get('link_author');
?>

<dd class="createdby d-flex align-items-center gap-2"
    itemprop="author"
    itemscope
    itemtype="https://schema.org/Person">

    <!-- Avatar autore -->
    <div class="author-avatar" aria-hidden="true"> <div class="avatar-wrapper avatar-extra-text">
        <?php

        // Carica l'oggetto utente
        $user = JFactory::getUser($userId);











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




                $mailOut = htmlspecialchars($user->email);


                // Verifica se l'immagine del profilo è presente
                if ($profileImageField && !empty($profileImageField->value)) {
                    // Mostra l'immagine del profilo
                    $immagineProfilo = $profileImageField->value; // Percorso dell'immagine
                } else {
                    // Immagine non trovata, puoi mostrare un'immagine predefinita
                    $immagineProfilo = '<img src="bootstrap-italia/assets/placeholders/img-avatar-250x250.png" alt="Immagine profilo">
                    <span class="visually-hidden">Immagine profilo</span>';
                }


                // Sostituisci i segnaposto con i dati dell'utente, gestendo valori vuoti
                echo '<div class="avatar size-sm">'. $immagineProfilo.'</div>';
                echo '<div class="ms-3 card-avatar-content">';
                echo '<small class="">'.Text::sprintf('COM_CONTENT_WRITTEN_BY', $author).'<a href="mailto:'.$mailOut.'">'.htmlspecialchars($user->name).'</a></small></div>';


        }

        ?>
        </div>    </div>



</dd>


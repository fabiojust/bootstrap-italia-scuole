<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Associations;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Component\Content\Site\Helper\RouteHelper;

// Articolo singolo nella vista FOGLIA (es. navigando direttamente in "Indirizzi di Studio")
// La modalità icon/image viene rilevata dai params della categoria corrente.

$params    = $this->item->params;
$canEdit   = $this->item->params->get('access-edit');
$info      = $params->get('info_block_position', 0);

$currentDate   = Factory::getDate()->format('Y-m-d H:i:s');
$isUnpublished = ($this->item->state == ContentComponent::CONDITION_UNPUBLISHED || $this->item->publish_up > $currentDate)
    || ($this->item->publish_down < $currentDate && $this->item->publish_down !== null);

$introimg = json_decode($this->item->images);

$app           = Factory::getApplication();
$template      = $app->getTemplate(true)->template;
$baseImagePath = Uri::root(false) . 'media/templates/site/' . $template . '/images/';

$link = Route::_(RouteHelper::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));

// ── Modalità card: rileva dai params della categoria corrente ─────────────────
// Se la categoria ha un'immagine impostata in backend → 'image' (Potenziamenti)
// Altrimenti → 'icon' (Indirizzi di Studio)
// Puoi anche forzarla via $this->cardMode se impostata dal parent template.
if (isset($this->cardMode)) {
    $cardMode = $this->cardMode;
} else {
    $thisCatParams = @json_decode($this->category->params ?? '{}');
    $cardMode = !empty($thisCatParams->image) ? 'image' : 'icon';
}

// ── Parsing del campo "Didascalia immagine intro" (testo libero, nessuna validazione)
// Formato: "nome-icona|nome-colore"   es. "it-code|success"
// Solo icona:  "it-globe"             → icona it-globe, colore default (primary)
// Solo colore: "|warning"             → icona default, colore arancio
// Entrambi:    "it-pa|info"           → icona it-pa, colore azzurro
// Il nome-colore è un token Bootstrap: primary, success, warning, danger, info, secondary
$captionRaw   = $introimg->image_intro_caption ?? '';
$captionParts = explode('|', $captionRaw, 2);
$iconName     = trim($captionParts[0]) ?: 'it-presentation';  // prima parte = nome sprite

// Ricava il nome colore e costruisce le tre classi
$colorName   = isset($captionParts[1]) ? preg_replace('/[^a-z0-9_-]/i', '', trim($captionParts[1])) : '';
$colorName   = $colorName ?: 'primary';
$borderClass = 'border-' . $colorName;        // es. border-success
$iconClass   = 'icon-'   . $colorName;        // es. icon-success
$btnClass    = 'btn-outline-' . $colorName;   // es. btn-outline-success

// Scegli lo sprite corretto (Bootstrap Icons "bi-" vs Bootstrap Italia "it-")
$spriteFile = str_starts_with($iconName, 'bi-') ? 'bootstrap-icons.svg' : 'sprites.svg';
$iconAnchor = ($spriteFile === 'bootstrap-icons.svg') ? substr($iconName, 3) : $iconName;

// ── In modalità 'image': image_intro è il percorso file dal media manager ─────
$imageUrl = !empty($introimg->image_intro) ? htmlspecialchars($introimg->image_intro, ENT_QUOTES, 'UTF-8') : '';
$imageAlt = htmlspecialchars($introimg->image_intro_alt ?? $this->item->title, ENT_QUOTES, 'UTF-8');

?>

<article class="it-card rounded border-top border-4 <?php echo $borderClass; ?> shadow-sm h-100 d-flex flex-column<?php echo $isUnpublished ? ' system-unpublished' : ''; ?>">

    <?php /* ── Area superiore: ICONA (Indirizzi) o IMMAGINE (Potenziamenti) ── */ ?>

    <?php if ($cardMode === 'icon') : ?>
        <?php /* Modalità ICONA: il nome dello sprite viene letto da image_intro */ ?>
        <div class="it-card-icon-area text-center pt-4 pb-2">
            <svg class="icon icon-xl <?php echo $iconClass; ?>" aria-hidden="true">
                <use href="<?= $baseImagePath ?><?= $spriteFile ?>#<?php echo htmlspecialchars($iconAnchor, ENT_QUOTES, 'UTF-8'); ?>"></use>
            </svg>
        </div>

    <?php elseif ($cardMode === 'image' && !empty($imageUrl)) : ?>
        <?php /* Modalità IMMAGINE: immagine intro a larghezza piena, crop centrato */ ?>
        <div class="it-card-image-wrapper overflow-hidden" style="height:140px;">
            <img src="<?php echo $imageUrl; ?>"
                 alt="<?php echo $imageAlt; ?>"
                 class="w-100 h-100"
                 style="object-fit:cover; object-position:center;">
        </div>

    <?php else : ?>
        <?php /* Fallback: icona generica */ ?>
        <div class="it-card-icon-area text-center pt-4 pb-2">
            <svg class="icon icon-xl <?php echo $iconClass; ?>" aria-hidden="true">
                <use href="<?= $baseImagePath ?>sprites.svg#it-presentation"></use>
            </svg>
        </div>
    <?php endif; ?>

    <?php /* ── Corpo card ── */ ?>
    <div class="it-card-body d-flex flex-column flex-grow-1 p-3">

        <h3 class="it-card-title h6 mb-2">
            <a href="<?php echo $link; ?>"><?php echo $this->item->title; ?></a>
        </h3>
        <?php if ($canEdit) : ?>
            <?php echo LayoutHelper::render('joomla.content.icons', ['params' => $params, 'item' => $this->item]); ?>
        <?php endif; ?>

        <?php /* Tags */ ?>
        <?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
            <div class="mb-2">
                <?php echo LayoutHelper::render('joomla.content.tags', $this->item->tags->itemTags); ?>
            </div>
        <?php endif; ?>

        <?php /* Descrizione */ ?>
        <p class="it-card-text small flex-grow-1">
            <?php echo JHTML::_('string.truncate', $this->item->introtext, 160, false, false); ?>
        </p>

        <?php /* Bottone DETTAGLI */ ?>
        <footer class="it-card-related mt-auto pt-2">
            <a href="<?php echo $link; ?>" class="btn <?php echo $btnClass; ?> btn-sm w-100">
                DETTAGLI
            </a>
        </footer>

    </div>
</article>

<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   (C) 2020 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\CMS\Uri\Uri;

//print_r($items[0]->parent_title);
//echo $items[0]->parent_id;
//echo $items[0]->parent_language;
//echo $items[0]->parent_title;

$baseImagePath = Uri::root(false) . "media/templates/site/joomla-italia-theme/images/";

?>

<?php foreach ($items as $item) : ?>

    <div class="col-12 col-lg-4 pb-3 mb-3">
        <article class="it-card it-card-inline it-card-inline-mini it-card-image rounded shadow-sm border h-100">
            <!--card first child is all the card content: title (link) + footer -->
            <div class="it-card-inline-content">
                <h3 class="it-card-title h6">
                    <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
                </h3>
                <?php if ($params->get('show_introtext')) : ?>
                <p class="it-card-text px-3"><small><?php echo $item->displayIntrotext; ?></small></p>
                <?php endif; ?>
                <?php $date = $item->displayDate ?? $item->publish_up; ?>
                <?php if ($date) : ?>
                <footer class="it-card-related it-card-footer">
                    <time class="it-card-date" datetime="<?php echo HTMLHelper::_('date', $date, 'Y-m-d'); ?>"><?php echo HTMLHelper::_('date', $date, Text::_('DATE_FORMAT_LC3')); ?></time>
                </footer>
                <?php endif; ?>
            </div>
            <!--card second child is the image (optional)-->
            <div class="it-card-image-wrapper">
                <div class="ratio ratio-1x1">
                    <figure class="figure img-full">
                        <?php if ((json_decode($item->images)->image_intro) ==''): ?>
                            <img src="<?= $baseImagePath ?>imgsegnaposto.jpg" alt="<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php else: ?>
                            <img src="<?php echo json_decode($item->images)->image_intro; ?>" alt="<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>" />
                        <?php endif; ?>
                    </figure>
                </div>
            </div>
        </article>
    </div>
<?php endforeach; ?>
<div class="col-12 text-center">
    <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($items[0]->parent_id, $items[0]->parent_language)); ?>" class="view-all" title="Vedi tutti"><strong>Vedi tutti</strong></a>
</div>

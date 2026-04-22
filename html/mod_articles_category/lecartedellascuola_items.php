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
use Joomla\CMS\Factory;

$app = Factory::getApplication();
$template = $app->getTemplate(true)->template;
$baseImagePath = Uri::root(false) . "media/templates/site/" . $template . "/images/";

//print_r($items[0]->parent_title);
//echo $items[0]->parent_id;
//echo $items[0]->parent_language;
//echo $items[0]->parent_title;

?>
<ul class="splide__list it-carousel-all">
    <?php foreach ($items as $item) : ?>
    <li class="splide__slide">
        <div class="it-single-slide-wrapper p-2 h-100">
            <article class="it-card rounded border shadow-sm h-100">
                <h4 class="it-card-title it-card-title-icon">
                    <a href="<?php echo $item->link; ?>" title="<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo $item->title; ?>
                        <div class="it-card-title-icon-wrapper">
                            <svg class="icon icon-primary" aria-hidden="true">
                                <use href="<?= $baseImagePath ?>sprites.svg#it-file"></use>
                            </svg>
                        </div>
                    </a>
                </h4>
                <div class="it-card-body">
                    <?php if ($params->get('show_introtext')) : ?>
                        <p class="it-card-text"><?php echo $item->displayIntrotext; ?></p>
                    <?php endif; ?>
                    <footer class="it-card-related">
                        <div class="it-card-taxonomy">
                            <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->catid, $item->language)); ?>" class="it-card-category it-card-link"><span class="visually-hidden">Categoria correlata: </span><?php echo $item->category_title; ?></a>
                        </div>
                    </footer>
                </div>
            </article>
        </div>
    </li>
    <?php endforeach; ?>
</ul>

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
//print_r($items[0]->parent_title);
//echo $items[0]->parent_id;
//echo $items[0]->parent_language;
//echo $items[0]->parent_title;
$app = Factory::getApplication();
$template = $app->getTemplate(true)->template;
$baseImagePath = Uri::root(false) . "media/templates/site/" . $template . "/images/";

?>

<?php foreach ($items as $item) : ?>

    <div class="col-12 col-lg-4 pb-3 mb-3">
        <article class="it-card it-card-height-full rounded border shadow-sm h-100">
            <h4 class="it-card-title px-3 pt-3">
                <a href="<?php echo $item->link; ?>" data-focus-mouse="false"><?php echo $item->title; ?></a>
            </h4>
            <div class="it-card-body">
                <?php if ($params->get('show_introtext')) : ?>
                <p class="it-card-text"><?php echo $item->displayIntrotext; ?></p>
                <?php endif; ?>

                <?php if ($params->get('show_tags', 1) && !empty($item->tags->itemTags)) : ?>
                <footer class="it-card-related">
                    <div class="it-card-taxonomy mb-3">
                        <?php foreach ($item->tags->itemTags as $tag) : ?>
                        <div class="chip chip-simple chip-sm chip-primary">
                            <span class="chip-label"><?php echo $tag->title; ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </footer>
                <?php endif; ?>

                <?php if ($params->get('show_author', 0) && !empty($item->author)) : ?>
                   <div class="it-card-footer" aria-label="Autore:">
      
                    <?php
                    echo LayoutHelper::render(
                        'joomla.content.info_block.author',
                        [
                            'item'   => $item,
                            'params' => $params
                        ]
                    );
                    ?>
                </div>
                <?php endif; ?>
            </div>
        </article>
    </div>
<?php endforeach; ?>
<div class="col-12 text-center">
    <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($items[0]->parent_id, $items[0]->parent_language)); ?>" class="view-all" title="Vedi tutti"><strong>Vedi tutti</strong></a>
</div>

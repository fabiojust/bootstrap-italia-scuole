<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;

if (!$list) {
    return;
}
$countcat =0;
?>

<?php

//print_r($list);

//echo $list[0]->parent_title;

?>
<div class="bg-white py-5 sectioncartescuola">
    <div class="container mod-schededidattiche">

        <div class="row justify-content-center">        
            <div class="col-md-10">
                <div class="it-carousel-wrapper it-carousel-landscape-abstract-three-cols splide" data-bs-carousel-splide data-splide='{"gap":".5rem", "breakpoints":{"768":{"gap":".5rem"}, "992":{"gap":".5rem"}}}'>
                    <?php if ((bool) $module->showtitle) : ?>
                    <div class="it-header-block mb-4">
                        <div class="it-header-block-title">
                            <h2><?php echo $module->title; ?></h2>
                            <p>I documenti recenti</p>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="splide__track ps-lg-3 pe-lg-3">
                        <?php $items = $list; ?>
                        <?php require ModuleHelper::getLayoutPath('mod_articles_category', $params->get('layout', 'default') . '_items'); ?>
                    </div>
                </div>

                <?php if (!empty($list)) : ?>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($list[0]->parent_id, $list[0]->parent_language)); ?>" class="btn btn-primary" title="Vai alle carte della scuola">Tutti i documenti</a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
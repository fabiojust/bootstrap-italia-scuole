<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Factory;

$app = Factory::getApplication();
$template = $app->getTemplate(true)->template;
$baseImagePath = Uri::root(false) . "media/templates/site/" . $template . "/images/";

$input  = $app->getInput();
$option = $input->getCmd('option');
$view   = $input->getCmd('view');
$id     = $input->getInt('id');
?>
<div class="row">
    <?php foreach ($list as $item) : ?>
    <div class="col-lg-6 pb-3 mt-3">
        <article class="it-card rounded border shadow-sm h-100">
            <h4 class="it-card-title it-card-title-icon">
                <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->id, $item->language)); ?>">
                    <?php echo $item->title; ?>
                    <div class="it-card-title-icon-wrapper">
                        <svg class="icon icon-primary" aria-hidden="true">
                            <use href="<?= $baseImagePath ?>sprites.svg#it-files"></use>
                        </svg>
                    </div>
                </a>
            </h4>
        </article>
    </div>
    <?php endforeach; ?>
</div>

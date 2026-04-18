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
$contarticolo =0;
$numeroarticolo =0;
?>

<?php if ((bool) $module->showtitle) : ?>
<?php endif; ?>
   
	

<div class="it-carousel-wrapper it-carousel-landscape-abstract splide carousel-400 mb-5"
     data-bs-carousel-splide=""
       data-splide='{
       "perPage": 1,
       "autoplay": true,
       "interval": 5000,
       "pauseOnHover": true
     }'
     id="splide01"
     role="region"
     aria-roledescription="Carosello">
  <div class="splide__track">
    <ul class="splide__list">
                <?php $items = $list; ?>
                <?php require ModuleHelper::getLayoutPath('mod_articles_category', $params->get('layout', 'default') . '_items'); ?>
            </ul>


        </div>
    </div>


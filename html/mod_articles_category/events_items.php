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
use Joomla\Component\Fields\Administrator\Helper\FieldsHelper;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;


//print_r($items[0]->parent_title);
//echo $items[0]->parent_id;
//echo $items[0]->parent_language;
//echo $items[0]->parent_title;

?>

<?php foreach ($items as $item) : ?>


 <li class="splide__slide">
        <div class="it-single-slide-wrapper h-100 p-2">
          <!--start it-card-->
          <article class="it-card card it-card-image it-card-height-full rounded shadow-sm border">
            <!--card first child is the title (link)-->
            <h3 class="it-card-title h6">
               <a href="<?php echo $item->link; ?>" class="" data-focus-mouse="false"><?php echo $item->title; ?></a>           
            </h3>
            <!--card second child is the image (optional)-->
            <div class="it-card-image-wrapper">
              <div class="ratio ratio-21x9">
                <figure class="figure img-full">
                    <?php if ((json_decode($item->images)->image_intro) ==''): ?> 
                            <img src="/templates/joomla-italia-theme/img/imgsegnaposto.jpg" class="img-fluid" alt="<?php echo $item->title; ?>">
                        <?php else: ?>   
                            <img src="<?php echo json_decode($item->images)->image_intro; ?>" class="img-fluid" alt="<?php echo $item->title; ?>" />
                        <?php endif; ?>
                                            <div class="card-calendar d-flex flex-column justify-content-center">
                                     <span class="card-date">
                                      <?php
										$customFields = FieldsHelper::getFields('com_content.article', $item, true);
										$values = array_column($customFields, 'value', 'name');
										echo $values['giorno']. '</span><span class="card-day">'.$values['mese'].'</span><span class="card-day">'.$values['ora'];	
										?>
                                    </span>
                                  </div>
                </figure>

              </div>
            </div>
            <!--card body content-->
            <div class="it-card-body">
              <p class="it-card-text"><?php echo $item->displayIntrotext; ?></p>
            </div>
            <!--finally the card footer metadata-->
            <footer class="it-card-related it-card-footer">
              <div class="it-card-taxonomy d-flex justify-content-end">
               			<a class="read-more" href="<?php echo $item->link; ?>">Scopri di più</a>			  
              </div>
                    <div class="it-card-footer" aria-label="Link correlati:">

      </div>
            </footer>
          </article>
          <!--end it-card-->
        </div>
      </li>






  
    

<?php endforeach; ?>

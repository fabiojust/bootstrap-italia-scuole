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
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\CMS\Uri\Uri;

$app      = Factory::getApplication();
$template = $app->getTemplate(true)->template;

$this->category->text = $this->category->description;
$app->triggerEvent('onContentPrepare', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$this->category->description = $this->category->text;

$results              = $app->triggerEvent('onContentAfterTitle', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$afterDisplayTitle    = trim(implode("\n", $results));

$results              = $app->triggerEvent('onContentBeforeDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$beforeDisplayContent = trim(implode("\n", $results));

$results              = $app->triggerEvent('onContentAfterDisplay', [$this->category->extension . '.categories', &$this->category, &$this->params, 0]);
$afterDisplayContent  = trim(implode("\n", $results));

$catactive     = $this->category->title;
$baseImagePath = Uri::root(false) . 'media/templates/site/' . $template . '/images/';

// Immagine categoria
$catParams = @json_decode($this->category->params ?? '{}');
$catImage  = !empty($catParams->image) ? $catParams->image : $baseImagePath . 'imgsegnaposto.jpg';

?>

<div class="blog-offerta-formativa" itemscope itemtype="https://schema.org/Blog">

    <?php /* ── HERO ── */ ?>
    <section class="section py-5 bg-white border-bottom">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-7">
                    <?php if ($this->params->get('show_category_title', 1)) : ?>
                        <h1 class="display-5 fw-bold text-primary mb-3"><?php echo $this->category->title; ?></h1>
                    <?php endif; ?>
                    <?php if ($this->params->get('show_page_heading')) : ?>
                        <h1 class="display-5 fw-bold text-primary mb-3"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
                    <?php endif; ?>
                    <?php echo $afterDisplayTitle; ?>
                    <?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
                        <?php $this->category->tagLayout = new FileLayout('joomla.content.tags'); ?>
                        <?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
                    <?php endif; ?>
                    <?php if ($beforeDisplayContent || $afterDisplayContent || $this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
                        <div class="category-desc lead text-secondary mt-2">
                            <?php echo $beforeDisplayContent; ?>
                            <?php if ($this->params->get('show_description') && $this->category->description) : ?>
                                <?php echo HTMLHelper::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
                            <?php endif; ?>
                            <?php echo $afterDisplayContent; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-5 text-center">
                    <img src="<?php echo $catImage; ?>" class="img-fluid rounded shadow-sm" alt="<?php echo htmlspecialchars($this->category->title, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
            </div>
        </div>
    </section>

    <?php /* ── CONTENUTO ── */ ?>
    <div class="wrapperblog offerta-formativa-wrapper <?php echo $this->params->get('blog_class'); ?>">

        <?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
            <?php if ($this->params->get('show_no_articles', 1)) : ?>
                <div class="container py-4">
                    <div class="alert alert-info">
                        <span class="icon-info-circle" aria-hidden="true"></span>
                        <span class="visually-hidden"><?php echo Text::_('INFO'); ?></span>
                        <?php echo Text::_('COM_CONTENT_NO_ARTICLES'); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php /* ── Con sotto-categorie: raggruppa gli articoli per categoria figlia ── */ ?>
        <?php if ($this->children[$this->category->id]) : ?>
            <div class="wrapper-subcategorie">
                <?php foreach ($this->children[$this->category->id] as $kategorie) : ?>
                    <?php
                        // cardMode: 'image' se la sotto-categoria ha un'immagine impostata in backend
                        // (es. Potenziamenti), 'icon' altrimenti (es. Indirizzi di Studio)
                        $kp = @json_decode($kategorie->params ?? '{}');
                        $this->cardMode = !empty($kp->image) ? 'image' : 'icon';
                    ?>
                    <section class="py-5 border-bottom">
                        <div class="container">
                            <div class="title-section mb-4 pb-2 border-bottom border-primary border-2">
                                <h2 class="h4 text-primary fw-bold"><?php echo $kategorie->title; ?></h2>
                            </div>
                            <div class="row g-4">
                                <?php if (!empty($this->intro_items)) : ?>
                                    <?php foreach ($this->intro_items as $key => $item) : ?>
                                        <?php if ($item->catid !== $kategorie->id) {
                                            continue;
                                        } ?>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <?php
                                                $this->item = $item;
                                                echo $this->loadTemplate('itemsottocategorie');
                                            ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="text-end pt-3">
                                <a href="<?php echo Route::_(RouteHelper::getCategoryRoute($kategorie->id, $kategorie->language)); ?>"
                                   class="btn btn-outline-primary btn-sm">
                                    Vedi tutti
                                </a>
                            </div>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>

        <?php /* ── Senza sotto-categorie: mostra gli articoli in griglia ── */ ?>
        <?php elseif (!empty($this->intro_items)) : ?>
            <section class="py-5">
                <div class="container">
                    <div class="row g-4">
                        <?php foreach ($this->intro_items as $key => &$item) :
                            $this->item = &$item;
                            ?>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <?php echo $this->loadTemplate('item'); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if (!empty($this->link_items)) : ?>
            <div class="items-more">
                <?php echo $this->loadTemplate('links'); ?>
            </div>
        <?php endif; ?>

        <?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
            <div class="com-content-category-blog__navigation w-100 container py-3">
                <?php if ($this->params->def('show_pagination_results', 1)) : ?>
                    <p class="counter float-end pt-3 pe-2"><?php echo $this->pagination->getPagesCounter(); ?></p>
                <?php endif; ?>
                <div class="com-content-category-blog__pagination"><?php echo $this->pagination->getPagesLinks(); ?></div>
            </div>
        <?php endif; ?>

    </div>
</div>

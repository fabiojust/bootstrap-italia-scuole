 <?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

$app = Factory::getApplication();
$input = $app->getInput();
$wa = $this->getWebAssetManager();
$menu = $app->getMenu()->getActive();
$isHomePage = ($menu->home);
$credits = '<a href="https://www.protocollicreativi.it" target="_blank" rel="nofollow" title="Protocolli Creativi is a Joomla Provider">Made with love Joomla Italia Theme by Protocolli Creativi</a>';
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';
$templateParams = $this->params;  // carica i parametri impostati nel 

$baseImagePath = Uri::root(false).'media/templates/site/'.$this->template.'/images/';

$this->setMetaData('viewport', 'width=device-width, initial-scale=1, minimum-scale=1');
$this->setMetaData('theme-color', '#000000');


// Browsers support SVG favicons
// $this->addHeadLink(HTMLHelper::_('image', 'joomla-favicon.svg', '', [], true, 1), 'icon', 'rel', ['type' => 'image/svg+xml']);
// $this->addHeadLink(HTMLHelper::_('image', 'favicon.ico', '', [], true, 1), 'alternate icon', 'rel', ['type' => 'image/vnd.microsoft.icon']);
// $this->addHeadLink(HTMLHelper::_('image', 'joomla-favicon-pinned.svg', '', [], true, 1), 'mask-icon', 'rel', ['color' => '#000']);

$wa->usePreset('template.bootstrap-italia-scuole')
     ->useStyle('css.fontawesome')
     ->useStyle('css.fonts')
     ->useStyle('template.css.scuole-main')
     ->useStyle('template.css.scuole-menu')
     ->useStyle('template.css.scuole-jit')
     ->useStyle('css.table')
     ->useStyle('carousel')
     ->useStyle('carousel.theme')
       ->useStyle('template.css.custom')
     ->useScript('template.js.jquery362')
     ->useScript('template.js.carousel')
     ->useScript('template.js.jti')
  
     ->addInlineScript(
         "
		 window.addEventListener('load', function(event) {
			 $('#slideheader').owlCarousel({
	         loop:true,
	         margin:0,
	         nav:true,
	         items:1,
	         autoplay:false,
	         autoplayTimeout:5000,/*,
	         animateOut: 'fadeOut'*/
	         responsive:{
	             0:{
	                 nav:false
	             },
	             991:{
	                 nav:true
	             }
	         }
	     });

	     $('.owl-carousel').each(function() {
	     $(this).find('.owl-dot').each(function(index) {
	       $(this).attr('aria-label', index + 1);
	     });
	     });
   });",
         [],
         [],
         ['template.js.jquery362']
     );

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $this->language; ?>" lang="<?= $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <link rel="apple-touch-icon" sizes="57x57" href="/images/asset/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/images/asset/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/asset/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/images/asset/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/asset/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/images/asset/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/images/asset/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/images/asset/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/images/asset/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/images/asset/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/asset/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/images/asset/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/asset/favicon-16x16.png">
  <link rel="icon" href="/images/asset/favicon.ico">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	<jdoc:include type="metas" />

	<script src="/media/vendor/choicesjs/js/choices.min.js"></script>
	<link rel="stylesheet" href="/media/vendor/choicesjs/css/choices.min.css">


	<jdoc:include type="styles" />
	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/custom-scuole.css?v=3" rel="stylesheet" type="text/css" />

    <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/custom.css?v=8" rel="stylesheet" type="text/css" />
      <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/custom-colors.css?=v10" rel="stylesheet" type="text/css" />
     	<jdoc:include type="scripts" />

  <?php   	$wa->registerAndUseScript('choices', 'media/vendor/choicesjs/js/choices.min.js', [], ['defer' => true]);
        $wa->registerAndUseStyle('choices', 'media/vendor/choicesjs/css/choices.min.css');  ?>


 <style>
:root {
<?php
// Funzione: converte HEX → HSL
function hexToHsl($hex) {
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) {
        $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
        $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
        $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $r /= 255; $g /= 255; $b /= 255;
    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $l = ($max + $min) / 2;
    if ($max === $min) {
        $h = $s = 0;
    } else {
        $d = $max - $min;
        $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
        switch ($max) {
            case $r: $h = ($g - $b) / $d + ($g < $b ? 6 : 0); break;
            case $g: $h = ($b - $r) / $d + 2; break;
            case $b: $h = ($r - $g) / $d + 4; break;
        }
        $h /= 6;
    }
    $h = round($h * 360);
    $s = round($s * 100);
    $l = round($l * 100);
    return "{$h}deg, {$s}%, {$l}%";
}

// Funzione: converte HEX → RGB
function hexToRgb($hex) {
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) {
        $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
        $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
        $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    return "$r, $g, $b";
}

$colors = [
  'primary'   => $templateParams->get('color_primary', '#0066cc'),
  'secondary' => $templateParams->get('color_secondary', '#5c6f82'),
  'success'   => $templateParams->get('color_success', '#008758'),
  'danger'    => $templateParams->get('color_danger', '#d9364f'),
  'warning'   => $templateParams->get('color_warning', '#ffb600'),
  'info'      => $templateParams->get('color_info', '#0099cc')
];

foreach ($colors as $name => $hex) {
    $hsl = hexToHsl($hex);
    $rgb = hexToRgb($hex);
    echo "  --color-{$name}: hsl({$hsl});\n";
    echo "  --color-{$name}-rgb: {$rgb};\n";
}
?>

  /* Compatibilità con Bootstrap Italia */
  --bs-primary: var(--color-primary);
  --bs-secondary: var(--color-secondary);
  --bs-success: var(--color-success);
  --bs-danger: var(--color-danger);
  --bs-warning: var(--color-warning);
  --bs-info: var(--color-info);
  --bs-btn-bg: var(--color-primary);


  /* Compatibilità RGB Bootstrap */
  --bs-primary-rgb: var(--color-primary-rgb);
  --bs-secondary-rgb: var(--color-secondary-rgb);
  --bs-success-rgb: var(--color-success-rgb);
  --bs-danger-rgb: var(--color-danger-rgb);
  --bs-warning-rgb: var(--color-warning-rgb);
  --bs-info-rgb: var(--color-info-rgb);
}
</style>


</head>
<body class="<?= $pageclass ? htmlspecialchars($pageclass) : ''; ?>">
<header
  class="it-header-wrapper it-header-sticky"
  data-bs-toggle="sticky"
  data-bs-position-type="fixed"
  data-bs-sticky-class-name="is-sticky"
  data-bs-target="#header-nav-wrapper"
>
  <div class="it-header-slim-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="it-header-slim-wrapper-content">
            <?php if ($this->params->get('showTopBarMessage')) : ?>
              <a class="d-lg-block navbar-brand" href="<?= htmlspecialchars($this->params->get('topbarTitleLink')); ?>"><?php echo htmlspecialchars($this->params->get('topbarTitle')); ?></a>
            <?php endif; ?>
            <div class="it-header-slim-right-zone">
              <jdoc:include type="modules" name="lingua" style="none" />
              <jdoc:include type="modules" name="avatar" style="none" />
              <?php if ($this->params->get('showBtnTopbar')) : ?>
                    	<?php
                           $fieldValues = $this->params->get('showBtnTopbarFields');
                  if (! empty($fieldValues)) :
                      foreach ($fieldValues as $value):
                          ?>
			                     <a class="btn btn-icon btn-full" href="<?= $value->topbarbuttonlink ?>" title="<?=$value->topbarbuttontitle?>" aria-label="<?=$value->topbarbuttontitle?>">
				                     <span class="rounded-icon">
			                       		<svg class="icon icon-primary">
			                          		<use xlink:href="<?=$baseImagePath?>sprites.svg#<?=$value->topbarbuttonicon?>"></use>
			                          </svg>
			                       </span>
			                       <span class="d-none d-lg-block"><?=$value->topbarbuttontitle?></span>
			                     </a>
					                 <?php endforeach; ?>
			                <?php endif; ?>

              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="it-nav-wrapper">
    <div class="it-header-center-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="it-header-center-content-wrapper">
              <div class="it-brand-wrapper">
                <a href="<?php echo $this->baseurl; ?>/">
                  <?php if ($this->params->get('showLogo')) : ?>
                    <img src="<?= htmlspecialchars($this->params->get('imageLogo')); ?>" title="<?= htmlspecialchars($this->params->get('logoTitle')); ?>" class="icon" alt="logo">
                    <div class="it-brand-text">
                      <div class="it-brand-tagline"><?= htmlspecialchars($this->params->get('logoTopTitle')); ?></div>
                      <div class="it-brand-title"><?= htmlspecialchars($this->params->get('logoTitle')); ?></div>
                      <div class="it-brand-tagline"><?= htmlspecialchars($this->params->get('logoSubtitle')); ?></div>
                    </div>
                  <?php endif; ?>
                </a>
              </div>
              <div class="it-right-zone <?php if ($this->countModules('cerca')): ?>normalizeflex<?php endif; ?>">
                <jdoc:include type="modules" name="cerca" style="none" />

                <?php if ($this->params->get('showSocial')) : ?>
                  <div class="it-socials d-none d-md-flex">
                    <span>Seguici su</span>
                    	  <?php $fieldValues = $this->params->get('showSocialTouchFields'); ?>
                        <ul>
                        <?php foreach ($fieldValues as $value): ?>
	                        <li>
														<a href="<?= $value->touchsuburl ?>" aria-label="<?= $value->touchsubname ?>" target="_blank">
															<svg class="icon"><use href="<?=$baseImagePath?>sprites.svg#<?=$value->touchsubicon?>">
															</use>
															</svg>
														</a>
													</li>
                        <?php endforeach; ?>
                        </ul>
                  </div>
                <?php endif; ?>
                <jdoc:include type="modules" name="bottonecerca" style="none" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="it-header-navbar-wrapper" id="header-nav-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-lg has-megamenu" aria-label="Navigazione principale">
              <button
                class="custom-navbar-toggler"
                type="button"
                aria-controls="nav4"
                aria-expanded="false"
                aria-label="Mostra/Nascondi la navigazione"
                data-bs-target="#nav4"
                data-bs-toggle="navbarcollapsible"
              >
                <svg class="icon">
                  <use href="<?=$baseImagePath?>sprites.svg#it-burger"></use>
                </svg>
              </button>
              <div class="navbar-collapsable" id="nav4" style="display: none">
                <div class="overlay" style="display: none"></div>
                <div class="close-div">
                  <button class="btn close-menu" type="button">
                    <span class="visually-hidden">Nascondi la navigazione</span>
                    <svg class="icon">
                      <use href="<?=$baseImagePath?>sprites.svg#it-close-big"></use>
                    </svg>
                  </button>
                </div>
                <div class="menu-wrapper">
                <jdoc:include type="modules" name="menuprincipale" style="none" />
                <jdoc:include type="modules" name="menusecondario" style="none" />
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
  <?php if ($this->params->get('showBanner') && $isHomePage) : ?>
    <section class="section bg-redbrown section-hero-left owl-carousel owl-theme slideheader p-0" id="slideheader">
    <?php
            $fieldValuesbanner = $this->params->get('showBannerfields'); ?>
          <?php foreach ($fieldValuesbanner as $value): ?>
            <div class="item-banner">
              <div class="decoration-01"></div>
              <div class="decoration-02"></div>
              <div class="container h-100 text-bannerhome">
                <div class="row align-items-center h-100">
                  <div class="col-12 col-lg-6">
                    <div class="text-white font-weight-normal h4"><?= $value->bannerTopTitle; ?></div>
                    <h1 class="text-white"><span class="d-line d-xl-block"><?= $value->bannerTitle; ?></span></h1>
                    <h2 class="text-white font-weight-normal h3"><?= $value->bannerDescription; ?></h2>
                    <a href="<?= $value->bannerUrlButton; ?>" class="btn btn-sm btn-outline-white mt-4"><?= $value->bannerButton; ?></a>
                  </div>
                </div>
              </div>
              <div class="hero-img d-none d-md-block" style="background-image: url('<?= $value->imageBanner; ?>');"></div>
            </div>
          <?php endforeach; ?>
    </section>
  <?php endif; ?>
<jdoc:include type="modules" name="hero" style="none" />
<main>
  <?php if ($this->countModules('breadcrumbs')): ?>
    <div class="wrapperbreadcrumbs">
      <div class="container">
        <jdoc:include type="modules" name="breadcrumbs" style="none" />
      </div>
    </div>
  <?php endif; ?>
  <jdoc:include type="component" />
  <jdoc:include type="modules" name="below" style="below" />
  <jdoc:include type="modules" name="user" style="user" />
</main>
<footer class="footersito">
  <div class="container">
  <?php if ($this->params->get('showLoghiFooter') || $this->params->get('showLogoEuropa'))  : ?>
    <div class="row mb-5">
      <div class="col-12 logos-wrapper">
        <?php if ($this->params->get('showLogoEuropa'))  : ?>
          <img class="ue-logo" src="<?= htmlspecialchars($this->params->get('imageLogoEuropaFooter')); ?>" alt="<?= htmlspecialchars($this->params->get('logoFooterEuropaDescrizione')); ?>">
        <?php endif; ?>
        <?php if ($this->params->get('showLoghiFooter'))  : ?>
        <div class="logo-footer">
          <a href="" aria-label="Vai alla homepage" title="Vai alla homepage" class="" data-focus-mouse="false">
            <img src="<?= htmlspecialchars($this->params->get('imageLogoFooter')); ?>" title="<?= htmlspecialchars($this->params->get('logoFooterTitle')); ?>" alt="logo">
          </a>
          <p class="h1">
            <a href="">
              <span><?= htmlspecialchars($this->params->get('logoFooterTopTitle')); ?></span>
              <span>
                <strong><?= htmlspecialchars($this->params->get('logoFooterTitle')); ?></strong>
              </span>
              <span><?= htmlspecialchars($this->params->get('logoFooterSubtitle')); ?></span>
            </a>
          </p>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>
    <div class="row">
      <div class="col-6 col-lg-3 pb-3 pb-lg-0">
        <jdoc:include type="modules" name="footer1" style="footer" />
      </div>
      <div class="col-6 col-lg-3 pb-3 pb-lg-0">
        <jdoc:include type="modules" name="footer2" style="footer" />
      </div>
      <div class="col-6 col-lg-3 pb-3 pb-lg-0">
        <jdoc:include type="modules" name="footer3" style="footer" />
      </div>
      <div class="col-6 col-lg-3 pb-3 pb-lg-0">
        <jdoc:include type="modules" name="footer4" style="footer" />
      </div>
    </div>
    <?php if ($this->countModules('arealegale')): ?>
      <div class="area-legale"><jdoc:include type="modules" name="arealegale" style="none" /></div>
    <?php endif; ?>
  </div>
  <div class="copyright mt-3 py-4 mt-lg-5">
    <div class="container text-center">
        <jdoc:include type="modules" name="copyrightcustom" style="footer" />
    </div>
  </div>
<!--  <div class="container py-4">
    <div class="row">
      <div class="col-lg-10 offset-lg-1 text-right footer-credits">
        <?= $credits ?>
      </div>
    </div>
  </div>  -->
</footer>


</body>
</html>

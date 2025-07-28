<?php
// Impedisce l'accesso diretto al file
defined('_JEXEC') or die;

// Le variabili che passeremo dall'override sono ora disponibili qui dentro
// Usiamo htmlspecialchars per la sicurezza dell'output
$baseImagePath = $displayData['baseImagePath'];
$title         = htmlspecialchars($displayData['title'], ENT_QUOTES, 'UTF-8');
$url           = $displayData['url'];
$sitename      = htmlspecialchars($displayData['sitename'], ENT_QUOTES, 'UTF-8');
?>

<div class="actions-wrapper actions-main">
<a class="toggle-actions" href="#" title="Vedi azioni" data-bs-toggle="modal" data-bs-target="#modalaction">
<svg class="icon icon-xs"><use xlink:href="<?= $baseImagePath ?>sprites.svg#it-more-items"></use></svg>
<span>Stampa / Condividi</span>
</a>
<div class="modal modal-actions fade no-print" tabindex="-1" role="dialog" id="modalaction" aria-labelledby="modalCenterTitle">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Chiudi finestra modale">
<svg class="icon"><use href="<?= $baseImagePath ?>sprites.svg#it-close"></use></svg>
</button>
</div>
<div class="modal-body">
<div class="link-list-wrapper">
<ul class="link-list ps-0 ms-0">
<li>
<a href="javascript:window.print();" class="list-item left-icon" title="Stampa il contenuto">
<svg class="icon"><use href="<?= $baseImagePath ?>sprites.svg#it-print"></use></svg>
<span>Stampa</span>
</a>
</li>
<li>
<a href="mailto:?subject=<?= $title ?>&amp;body=<?= $url ?>" class="list-item left-icon" title="Invia il contenuto">
<svg class="icon"><use href="<?= $baseImagePath ?>sprites.svg#it-mail"></use></svg>
<span>Invia</span>
</a>
</li>
<li>
<a class="list-item collapsed link-toggle" title="Condividi" href="#social-share" data-bs-toggle="collapse" aria-expanded="false" aria-controls="social-share" role="button" id="share-control">
<svg class="icon"><use href="<?= $baseImagePath ?>sprites.svg#it-share"></use></svg>
<span>Condividi</span>
<svg class="icon icon-right"><use href="<?= $baseImagePath ?>sprites.svg#it-expand"></use></svg>
</a>
<ul class="ps-0 link-sublist collapse" id="social-share" role="region" aria-labelledby="share-control">
<li>
<a class="list-item" href="https://www.facebook.com/sharer/sharer.php?u=<?= $url ?>" title="Condividi su: Facebook" target="_blank">
<svg class="icon"><use href="<?= $baseImagePath ?>sprites.svg#it-facebook"></use></svg>
<span>Facebook</span>
</a>
</li>
<li>
<a class="list-item" href="http://twitter.com/share?text=<?= $title ?>&amp;url=<?= $url ?>" title="Condividi su: Twitter" target="_blank">
<svg class="icon"><use href="<?= $baseImagePath ?>sprites.svg#it-twitter"></use></svg>
<span>Twitter</span>
</a>
</li>
<li>
<a class="list-item" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?= $url ?>&amp;title=<?= $title ?>&amp;source=<?= $sitename?>" title="Condividi su: Linkedin" target="_blank">
<svg class="icon"><use href="<?= $baseImagePath ?>sprites.svg#it-linkedin"></use></svg>
<span>Linkedin</span>
</a>
</li>
</ul>
</li>
</ul>
</div>
</div>
<div class="modal-footer">
<button class="py-1 px-3 btn btn-primary btn-sm" data-bs-dismiss="modal" type="button">Ok</button>
</div>
</div>
</div>
</div>
</div>

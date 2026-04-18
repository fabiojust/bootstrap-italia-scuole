<?php
defined('_JEXEC') or die;
?>

<div class="container">
  <div class="row">

<?php foreach ($list as $item) : ?>

<?php
  $img = $item->menu_image;        // campo "Link immagine"
  $bgclass = $item->anchor_css;    // classe css della voce
?>

<div class="col-md-6" style="height:250px;margin-bottom:50px;">

  <div class="modern-card <?= htmlspecialchars($bgclass) ?> shadow-lg">

    <?php if ($img) : ?>
      <img src="<?= htmlspecialchars($img) ?>"
           class="card-bg rounded"
           alt="<?= htmlspecialchars($item->title) ?>">
    <?php endif; ?>

    <div class="card-overlay rounded">

      <a class="stretched-link"
         href="<?= $item->flink ?>">

        <?= $item->title ?>

      </a>

    </div>

  </div>

</div>

<?php endforeach; ?>

  </div>
</div>
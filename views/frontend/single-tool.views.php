<?php

/** @var \app\core\View $this */

$this->page_title = $tool->page_title;
$this->description = $tool->meta_description;
$this->keywords = $tool->keywords;
$this->title = $tool->title;

?>

<!-- Top Content Container -->
<div class="tool-container">
    <!-- Tool Container -->
    <div class="tool-container--content">
        <p><?=$tool->subtitle?></p>
        <hr>
        <div>
            <?php include_once('tools/' . $tool->slug . '.views.php'); ?>
        </div>
        <hr>
        <!-- Output Container -->
        <div class="tool-container--content__output"></div>
    </div>
    <!-- Image Container -->
    <div class="tool-container--image">
        <img src="<?=SITE_PATH . '/' . $tool->featured_image?>" alt="<?= $this->title ?>">
    </div>
</div>

<!-- Description Content Container -->
<div class="tool-description">
    <?=$tool->description?>
</div>
<?php

/** @var \app\core\View $this */

$this->page_title = 'Finance Calculators';
$this->description = 'Finance Calculators';
$this->keywords = 'Finance Calculators,SIP calculator,gst calculator,emi calculator,PPF calculator';
$this->title = 'Finance Calculators';

?>

<div class="calculators">
    <?php foreach($tools as $key => $tool): ?>
        <div class="calculator">
            <a href="<?=$tool['slug']?>" class="calculator--image">
                <img src="<?= SITE_PATH . '/' . $tool['featured_image'] ?>" alt="<?= $this->title ?>">
            </a>
            <div class="calculator--details">
                <h3><?= $tool['tool_name'] ?></h3>
                <p><?= $tool['subtitle'] ?></p>
            </div>
            <a href="<?=$tool['slug']?>"><button class="btn btn-primary">Launch Calculator</button></a>
        </div>
    <?php endforeach; ?>
</div>
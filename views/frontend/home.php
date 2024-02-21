<?php

/** @var \app\core\View $this */

$this->title = 'Homepage';

?>

<h1>Home</h1>

<h3>Welcome <?php echo $name ?></h3>

<?php foreach($tools as $key => $tool): ?>

    <ul>
        <li><?= $tool['tool_name'] ?></li>
    </ul>

<?php endforeach; ?>
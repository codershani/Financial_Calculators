<?php 
/** @var $exception \Exception */


/** @var \app\core\View $this */

$this->page_title = 'Not Found';
?>

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404"><?php echo $exception->getCode() ?></div>
        <p class="lead text-gray-800 mb-5"><?php echo $exception->getMessage() ?></p>
        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
        <a href="/">&larr; Back to Home</a>
    </div>

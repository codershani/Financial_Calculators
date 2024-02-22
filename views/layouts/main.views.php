<?php 

use app\core\Application; 

/** @var \app\core\View $this */

include_once 'partials/header.views.php';

?>

<body id="page-top">

<?php include_once 'partials/frontend-nav.views.php' ?>

    <!-- Begin Page Content -->
    <div class="container my-5">
        <?php if (Application::$app->session->getFlash('success')): ?>
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Page Heading -->
        <h1 class="page-heading text-dark"><?=$this->title?></h1>
            
        {{content}}
            
    </div>
    <!-- /.container -->

<?php 
include_once 'partials/footer-bar.views.php'; 
include_once 'partials/footer.views.php'; 
?>
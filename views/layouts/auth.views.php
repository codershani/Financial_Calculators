<?php 

/** @var \app\core\View $this */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$this->title?> - Finance Calculators</title>

    <!-- Custom fonts for this template-->
    <link href="<?=SITE_ASSETS_PATH?>/extras/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=SITE_ASSETS_PATH?>/css/admin.min.css" rel="stylesheet">

</head>

<body id="page-top" class="bg-gradient-primary">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <div class="container">
            {{content}}
        </div>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Bootstrap core JavaScript-->
    <script src="<?=SITE_ASSETS_PATH?>/extras/jquery/jquery.min.js"></script>
    <script src="<?=SITE_ASSETS_PATH?>/extras/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=SITE_ASSETS_PATH?>/extras/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=SITE_ASSETS_PATH?>/js/admin.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=SITE_ASSETS_PATH?>/extras/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=SITE_ASSETS_PATH?>/js/demo/chart-area-demo.js"></script>
    <script src="<?=SITE_ASSETS_PATH?>/js/demo/chart-pie-demo.js"></script>

</body>

</html>
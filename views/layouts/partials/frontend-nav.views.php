<?php use app\core\Application; ?>

<body id="page-top">

<?php include_once 'frontend-nav.views.php' ?>
        
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Contact Us</a>
                </li>

                <?php if(!Application::isGuest()):?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> <?php echo Application::$app->user->getDisplayName() ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/admin"><i class="fas fa-tachometer-alt me-2"></i> Admin Dashboard</a></li>
                            <li><a class="dropdown-item" href="/logout"><i class="fas fa-power-off me-2"></i> Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
            </ul>
            
            <?php endif; ?>
        </div>
    </div>
</nav>
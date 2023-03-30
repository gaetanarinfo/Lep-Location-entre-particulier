<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <div class="container px-5">
        
        <a class="navbar-brand" href="/"><?= $site_config['title'] ?></a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <?php foreach ($menu_row as $value) { ?>

                    <li class="nav-item me-3"><a class="nav-link fw-bold" href="<?= $value['menu_url'] ?>"><i class="fa-solid <?= $value['menu_icon'] ?> me-2"></i> <?= $value['menu_title'] ?></a></li>

                <?php } ?>
                
            </ul>

        </div>

    </div>

</nav>
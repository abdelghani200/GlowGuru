<div class="container-fluid navbar-nav mx-auto">

    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-nav mx-auto">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>accueil"> <img width="70px" height="60px" src="<?php echo BASE_URL; ?>public/images/GlowGuru.jpg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>accueil">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle ms-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-right-to-bracket"></i> Connection
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>login">Login</a></li>
                        
                            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>logout">Se déconnecter</a></li>
                       
                    </ul>
                </div>
                </ul>
                <!-- <form class="d-flex ms-3">
                    <input class="form-control me-2" type="search" placeholder="Search For Product" class="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
</div>
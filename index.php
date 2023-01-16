<?php

require_once './autoload.php';


require_once("./Views/includes/header.php");

$home = new HomeController();

$home->index("accueil");



require_once("./Views/includes/footer.php");
<?php
require "includes/error_handler.php";
require "includes/default_config.php";
require "controleur/rooter.class.php";

$rooter = new Rooter();
$rooter->rooterRequete();

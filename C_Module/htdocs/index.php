<?php 
    include("lib/lib.php");
    
    if($currentPage == "restAPI"){
        include("restAPI/".$params[1]);
    }
    else if($currentPage == "openAPI"){
        include("openAPI/".$params[1]);
    }
    else if(isset($_GET["single_mode"]) && $_GET["single_mode"]) {
        include("pages/".$currentPage.".php");
    }
    else {
        include("layouts/header.php");

        include("pages/".$currentPage.".php");

        include("layouts/footer.php");
    }
?>
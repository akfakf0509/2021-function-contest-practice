<?php 
    include("lib/lib.php");
    
    if($currentPage == "restAPI"){
        include("restAPI/".$params[1]);
    }
    else {
        include("layouts/header.php");

        include("pages/".$currentPage.".php");

        include("layouts/footer.php");
    }
?>
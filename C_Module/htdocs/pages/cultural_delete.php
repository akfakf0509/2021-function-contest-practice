<?php
    if(isset($_GET["id"])){
        $image = getRow("SELECT * FROM nihlist WHERE nihListKey = ?", array($_GET["id"]))->image;
        unlink("C:/xampp/nihcImage/".$image);
        query("DELETE FROM nihlist WHERE nihListKey = ?", array($_GET["id"]));

        echo "
        <script>
            location.href = 'cultural_status';
        </script>";
    }
    else {
        echo "
        <script>
            alert('올바르지 않은 접근입니다.);
            location.href = '/';
        </script>";
    }
?>
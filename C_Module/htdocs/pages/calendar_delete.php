<?php
    if(isset($_GET["id"])){
        query("DELETE FROM showlist WHERE showUid = ?", array($_GET["id"]));

        echo "
        <script>
            history.back();
        </script>";
    }
    else {
        echo "
        <script>
            alert('올바르지 않은 접근입니다.');
            location.href = '/';
        </script>";
    }

<?php
    if(isset($_POST["nihListKey"]) && isset($_POST["ccbaKdcd"]) && isset($_POST["ccbaAsno"]) && isset($_POST["ccbaCtcd"]) && isset($_POST["ccmaName"]) && isset($_POST["crltsnoNm"]) && isset($_POST["ccbaMnm1"])) {
        $nihListKey = $_POST["nihListKey"];
        $ccbaKdcd = $_POST["ccbaKdcd"];
        $ccbaAsno = $_POST["ccbaAsno"];
        $ccbaCtcd = $_POST["ccbaCtcd"];
        $ccbaCpno = $_POST["ccbaCpno"];
        $longitude = $_POST["longitude"];
        $latitude = $_POST["latitude"];
        $ccmaName = $_POST["ccmaName"];
        $crltsnoNm = $_POST["crltsnoNm"];
        $ccbaMnm1 = $_POST["ccbaMnm1"];
        $ccbaMnm2 = $_POST["ccbaMnm2"];
        $gcodeName = $_POST["gcodeName"];
        $bcodeName = $_POST["bcodeName"];
        $mcodeName = $_POST["mcodeName"];
        $scodeName = $_POST["scodeName"];
        $ccbaQuan = $_POST["ccbaQuan"];
        $ccbaAsdt = $_POST["ccbaAsdt"];
        $ccbaCtcdNm = $_POST["ccbaCtcdNm"];
        $ccsiName = $_POST["ccsiName"];
        $ccbaLcad = $_POST["ccbaLcad"];
        $ccceName = $_POST["ccceName"];
        $ccbaPoss = $_POST["ccbaPoss"];
        $ccbaAdmin = $_POST["ccbaAdmin"];
        $ccbaCncl = $_POST["ccbaCncl"];
        $ccbaCndt = $_POST["ccbaCndt"];
        $content = $_POST["content"];

        $image = $_FILES["image"];
        $tmp_name = $image["tmp_name"];
        $name = NULL;
        
        if ($tmp_name) {
            $is_image = getRow("SELECT * FROM nihlist WHERE nihListKey = ?", array($nihListKey));
            if($is_image) {
                unlink("C:/xampp/nihcImage/".$is_image->image);
            }

            $name = date("Y-m-d-H-i-s").$image["name"];
            move_uploaded_file($tmp_name, "C:/xampp/nihcImage/".$name);
        }


        $query = "UPDATE `nihlist` SET `ccbaKdcd`=?,`ccbaAsno`=?,`ccbaCtcd`=?,`ccbaCpno`=?,`longitude`=?,`latitude`=?,`ccmaName`=?,`crltsnoNm`=?,`ccbaMnm1`=?,`ccbaMnm2`=?,`gcodeName`=?,`bcodeName`=?,`mcodeName`=?,`scodeName`=?,`ccbaQuan`=?,`ccbaAsdt`=?,`ccbaCtcdNm`=?,`ccsiName`=?,`ccbaLcad`=?,`ccceName`=?,`ccbaPoss`=?,`ccbaAdmin`=?,`ccbaCncl`=?,`ccbaCndt`=?,`image`=?,`content`=? WHERE nihListKey = ?";
        $array = array($ccbaKdcd, $ccbaAsno, $ccbaCtcd, $ccbaCpno, $longitude, $latitude, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaCtcdNm, $ccsiName, $ccbaLcad, $ccceName, $ccbaPoss, $ccbaAdmin, $ccbaCncl, $ccbaCndt, $name, $content, $nihListKey);

        query($query, $array);

        echo "
        <script>
            location.href = '/cultural_status';
        </script>";
    }
    else {
        echo "
        <script>
            alert('올바르지 않은 접근입니다.');
        </script>";
    }
?>
<?php
    include("../lib/lib.php");

    $result = [];

    if(isset($_REQUEST["pageNo"]) && isset($_REQUEST["numOfRows"]) && isset($_REQUEST["bcodeName"])){
        $result["statusCd"] = "200";
        $result["statusCode"] = "정상";

        $bcodeName = $_REQUEST["bcodeName"];
        $numOfRows = $_REQUEST["numOfRows"];
        $pageNo = $_REQUEST["pageNo"];
        $totalCount = getRow("SELECT count(*) as totalCount FROM nihlist WHERE bcodeName LIKE ?", array("%".$bcodeName."%"))->totalCount;
        $items = json_decode(getRowAllToJson("SELECT * FROM nihlist WHERE bcodeName LIKE ? LIMIT ?, ?;", array("%".$bcodeName."%", ($pageNo - 1) * $numOfRows, $numOfRows)));

        $result["numOfRows"] = (int)$numOfRows;
        $result["pageNo"] = (int)$pageNo;
        $result["totalCount"] = $totalCount;

        for($i = 0; $i < count($items); $i++){
            if($items[$i]->image != ""){
                $path = "C:/xampp/nihcImage/".$items[$i]->image;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = "data:image/".$type.";base64,".base64_encode($data);

                $items[$i]->image = $base64;
            }
        }

        $result["items"] = $items;

        echo json_encode($result);
    }
    else {
        $result["statusCd"] = "401";
        $result["statusCode"] = "입력값이 올바르지 않습니다.";

        echo json_encode($result);
    }
?>
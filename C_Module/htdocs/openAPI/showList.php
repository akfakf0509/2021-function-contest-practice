<?php
include("../lib/lib.php");

$result = [];

if (isset($_REQUEST["searchType"])) {
    $result["statusCd"] = "200";
    $result["statusMsg"] = "정상";

    if ($_REQUEST["searchType"] == "Y" && isset($_REQUEST["year"])) {
        $year = $_REQUEST["year"];

        $result["showType"] = "Y";
        $result["year"] = $year;

        $showList_result = json_decode(getRowAllToJson("SELECT * FROM showlist WHERE YEAR(showDate) = ? ORDER BY showDate", array($year)));

        $result["totalCount"] = count($showList_result);
        $result["items"] = $showList_result;
    } else if ($_REQUEST["searchType"] == "M" && isset($_REQUEST["year"]) && isset($_REQUEST["month"])) {
        $year = $_REQUEST["year"];
        $month = $_REQUEST["month"];

        $result["showType"] = "M";
        $result["year"] = $year;
        $result["month"] = $month;

        $showList_result = json_decode(getRowAllToJson("SELECT * FROM showlist WHERE YEAR(showDate) = ? AND MONTH(showDate) = ?", array($year, $month)));

        $result["totalCount"] = count($showList_result);
        $result["items"] = $showList_result;
    } else {
        $result["statusCd"] = 401;
        $result["statusMsg"] = "입력값이 올바르지 않습니다.";
    }

    echo json_encode($result);
} else {
    $result["statusCd"] = 401;
    $result["statusMsg"] = "입력값이 올바르지 않습니다.";

    echo json_encode($result);
}

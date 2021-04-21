<?php 
    session_start();

    $params = isset($_GET["params"]) ? explode("/", $_GET["params"]) : [];
    $currentPage = isset($params[0]) ? $params[0] : "index";

    try {
        $db = new PDO("mysql:host=localhost;dbname=c_module_2021;charset=utf8;", "root", "");
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage(); 
    }

    function query($query, $array){
        global $db;
        $stmt = $db->prepare($query);
        return $stmt->execute($array);
    }

    function getRow($query, $array){
        global $db;
        $stmt = $db->prepare($query);
        $stmt->execute($array);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function getRowAll($query, $array){
        global $db;
        $stmt = $db->prepare($query);
        $stmt->execute($array);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function getRowAllToJson($query, $array){
        global $db;
        $stmt = $db->prepare($query);
        $stmt->execute($array);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }
?>
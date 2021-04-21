<?php
    $xml = simplexml_load_file("xml/nihList.xml");

    foreach($xml->item as $item){
        $ccbaKdcd = $item->ccbaKdcd;
        $ccbaAsno = $item->ccbaAsno;
        $ccbaCtcd = $item->ccbaCtcd;
        $detail = simplexml_load_file("xml/detail/".$ccbaKdcd."_".$ccbaCtcd."_".$ccbaAsno.".xml");
        $ccbaCpno = $detail->ccbaCpno;
        $longitude = $detail->longitude;
        $latitude = $detail->latitude;
        $ccmaName = $detail->item->ccmaName;
        $crltsnoNm = $detail->item->crltsnoNm;
        $ccbaMnm1 = $detail->item->ccbaMnm1;
        $ccbaMnm2 = $detail->item->ccbaMnm2;
        $gcodeName = $detail->item->gcodeName;
        $bcodeName = $detail->item->bcodeName;
        $mcodeName = $detail->item->mcodeName;
        $scodeName = $detail->item->scodeName;
        $ccbaQuan = $detail->item->ccbaQuan;
        $ccbaAsdt = $detail->item->ccbaAsdt;
        $ccbaCtcdNm = $detail->item->ccbaCtcdNm;
        $ccsiName = $detail->item->ccsiName;
        $ccbaLcad = trim($detail->item->ccbaLcad);
        $ccceName = $detail->item->ccceName;
        $ccbaPoss = trim($detail->item->ccbaPoss);
        $ccbaAdmin = trim($detail->item->ccbaAdmin);
        $ccbaCncl = $detail->item->ccbaCncl;
        $ccbaCndt = $detail->item->ccbaCndt;
        $image = $detail->item->imageUrl;
        $content = $detail->item->content;

        $query = "INSERT INTO `nihlist` (`ccbaKdcd`, `ccbaAsno`, `ccbaCtcd`, `ccbaCpno`, `longitude`, `latitude`, `ccmaName`, `crltsnoNm`, `ccbaMnm1`, `ccbaMnm2`, `gcodeName`, `bcodeName`, `mcodeName`, `scodeName`, `ccbaQuan`, `ccbaAsdt`, `ccbaCtcdNm`, `ccsiName`, `ccbaLcad`, `ccceName`, `ccbaPoss`, `ccbaAdmin`, `ccbaCncl`, `ccbaCndt`, `image`, `content`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $array = array($ccbaKdcd, $ccbaAsno, $ccbaCtcd, $ccbaCpno, $longitude, $latitude, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaCtcdNm, $ccsiName, $ccbaLcad, $ccceName, $ccbaPoss, $ccbaAdmin, $ccbaCncl, $ccbaCndt, $image, $content);

        query($query, $array);
    }
?>
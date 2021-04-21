<?php
if (isset($_POST["showName"]) && isset($_POST["showDate"]) && isset($_POST["showTime"]) && isset($_POST["showUid"])) {
    query("UPDATE showlist SET showName=?, showDate=?, showTime=?, organizer=?, place=?, cast=?, rm=?, updtDt=now() WHERE showUid=?", array($_POST["showName"], $_POST["showDate"], $_POST["showTime"], $_POST["organizer"], $_POST["place"], $_POST["cast"], $_POST["rm"], $_POST["showUid"]));

    echo "
        <script>
            history.back();
        </script>";
} else {
    echo "
        <script>
            alert('잘못된 접근 입니다.');
            location.href = '/';
        </script>";
}

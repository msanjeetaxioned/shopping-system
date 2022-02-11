<?php
if(isset($_COOKIE["user-data"])) {
    $submittedData = json_decode($_COOKIE["user-data"], true);
    $name = $submittedData['name'];
    $gender = $submittedData['gender'];
    $mobile = $submittedData['mobile'];
}

setcookie("user-data", "", time() - 300, "/", "", 0);
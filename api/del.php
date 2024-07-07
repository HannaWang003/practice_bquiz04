<?php
include_once "db.php";
$table = $_GET['table'];
$DB = ${ucfirst($table)};
if (isset($_GET['type'])) {
    switch ($_GET['type']) {
        case "big":
            $DB->del(['big_id' => $_GET['id']]);
            $Goods->del(['big' => $_GET['id']]);
            break;
        case "mid":
            $Goods->del(['mid' => $_GET['id']]);
            break;
        case "goods":
            $Goods->del($_GET['id']);
    }
}
$DB->del($_GET['id']);

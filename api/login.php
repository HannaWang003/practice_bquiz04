<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);
echo $DB->count($_POST);
switch ($table) {
    case "mem":
        $_SESSION['mem'] = $_POST['acc'];
        break;
    case "admin":
        $_SESSION['admin'] = $_POST['acc'];
        break;
}

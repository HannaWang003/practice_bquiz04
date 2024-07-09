<?php
include_once "db.php";
$_POST['cart'] = serialize($_SESSION['cart']);
$_POST['orderdate'] = date("Y-m-d");
$_POST['acc'] = $_SESSION['mem'];

echo $_POST['no'] = date("Ymd") . rand(100000, 999999);
$Order->save($_POST);
unset($_SESSION['cart']);

<?php
include_once "db.php";
$do = $_GET['do'];
unset($_SESSION[$do]);
to("../index.php");

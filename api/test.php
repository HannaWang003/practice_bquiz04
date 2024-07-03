<?php
include_once "db.php";
$t['acc'] = "admin";
$t['pw'] = "1234";
$t['pr'] = serialize([1, 2, 3, 4, 5]);
$Admin->save($t);

<?php
include_once "db.php";
$rows = $Type->all(['big_id' => 0]);
foreach ($rows as $row) {
?>
<option value="<?= $row['id'] ?>" <?= (isset($_GET['big']) && $_GET['big'] == $row['id']) ? "selected" : "" ?>>
    <?= $row['name'] ?></option>
<?php
}
?>
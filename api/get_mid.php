<?php
include_once "db.php";
$rows = $Type->all(['big_id' => $_GET['big_id']]);
foreach ($rows as $row) {
?>
    <option value="<?= $row['id'] ?>" <?= (isset($_GET['mid']) && $_GET['mid'] == $row['id']) ? "selected" : "" ?>>
        <?= $row['name'] ?></option>
<?php
}
?>
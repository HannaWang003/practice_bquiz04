<?php
if (isset($_GET['id']) && isset($_GET['qt'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if (!isset($_SESSION['mem'])) {
    to("?do=login");
}
?>
<h2 class="ct"><?= $_SESSION['mem'] ?>的購物車</h2>
<?php
if (empty($_SESSION['cart'])) {
    echo "<h3 class='ct'>目前購物車是空的</h3>";
} else {
?>
<table class="all">
    <tr>
        <th class="tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">數量</th>
        <th class="tt">庫存量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
        <th class="tt">操作</th>
    </tr>
    <?php
        foreach ($_SESSION['cart'] as $id => $qt) {
            $row = $Goods->find($id)
        ?>
    <tr>
        <td class="pp"><?= $row['no'] ?></td>
        <td class="pp"><?= $row['name'] ?></td>
        <td class="pp"><?= $qt ?></td>
        <td class="pp"><?= $row['stock'] ?></td>
        <td class="pp"><?= $row['price'] ?></td>
        <td class="pp"><?= $row['price'] * $qt ?></td>
        <td class="pp"><img src="./icon/0415.jpg" onclick="removeItem(<?= $id ?>)"></td>
    </tr>
    <?php
        }
        ?>
</table>
<div class="ct">
    <img src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
    <img src="./icon/0411.jpg" onclick="location.href='index.php'">
</div>
<?php
}
?>
<script>
function removeItem(id) {
    $.get('./api/del_item.php', {
        id
    }, () => {
        location.reload();
    })
}
</script>
<?php
$row = $Order->find($_GET['id']);
?>
<h2 class="ct">訂單編號<?= $row['no'] ?>的詳細資料</h2>
<style>
    th {
        width: 40%;
    }
</style>
<table class="all">
    <tr>
        <th class="tt">會員帳號</th>
        <td class="pp" colspan="4">
            <?= $row['acc'] ?>
        </td>
    </tr>
    <tr>
        <th class="tt">姓名</th>
        <td class="pp" colspan="4"><?= $row['name'] ?></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp" colspan="4"><?= $row['email'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp" colspan="4"><?= $row['addr'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp" colspan="4"><?= $row['tel'] ?></td>
    </tr>
    <tr>
        <th class="tt">商品名稱</th>
        <th class="tt">編號</th>
        <th class="tt">數量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
    </tr>
    <?php
    $row['cart'] = unserialize($row['cart']);
    foreach ($row['cart'] as $id => $qt) {
        $g = $Goods->find($id)
    ?>
        <tr>
            <td class="pp"><?= $g['name'] ?></td>
            <td class="pp"><?= $g['no'] ?></td>
            <td class="pp"><?= $qt ?></td>
            <td class="pp"><?= $g['price'] ?></td>
            <td class="pp"><?= $g['price'] * $qt ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <th class="tt" colspan="5">總價: <?= $row['total'] ?></th>
    </tr>
</table>
<div class=" ct">
    <input type="button" value="返回" onclick="history.go(-1)">
</div>
<?php
$rows = $Order->all();
?>
<h1 class="ct">訂單管理</h1>
<table class="all" style="text-align:center;">
    <tr>
        <th class="tt">訂單編號</th>
        <th class="tt">金額</th>
        <th class="tt">會員編號</th>
        <th class="tt">姓名</th>
        <th class="tt">下單時間</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
    <tr>
        <td class="pp"><a href="?do=detail&id=<?= $row['id'] ?>" style="text-decoration:none"><?= $row['no'] ?></a></td>
        <td class="pp"><?= $row['total'] ?></td>
        <td class="pp">
            <?= $row['acc'] ?>
        </td>
        <td class="pp">
            <?= $row['name'] ?>
        </td>
        <td class="pp">
            <?= $row['orderdate'] ?>
        </td>
        <td class="pp">
            <button onclick="del('order',<?= $row['id'] ?>)">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>
<script>
function del(table, id) {
    $.get('./api/del.php', {
        table,
        id
    }, () => {
        location.reload();
    })
}
</script>
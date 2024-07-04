<?php
$rows = $Mem->all();
?>
<table class="all" style="text-align:center;">
    <tr>
        <th class="tt">姓名</th>
        <th class="tt">會員帳號</th>
        <th class="tt">註冊日期</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp"><?= $row['name'] ?></td>
            <td class="pp"><?= $row['acc'] ?></td>
            <td class="pp"><?= $row['regdate'] ?></td>
            <td class="pp">
                <button onclick="location.href='?do=edit_mem&id=<?= $row['id'] ?>'">編輯</button><button onclick="del('mem',<?= $row['id'] ?>)">刪除</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
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
<?php
$row = $Admin->find($_GET['id']);
$row['pr'] = unserialize($row['pr']);
?>
<div class="ct">
    <h2>修改管理帳號</h2>
</div>
<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <th class="tt" style="width:40%">帳號</th>
            <td class="pp"><input type="text" name="acc" id="acc" value="<?= $row['acc'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" id="pw" value="<?= $row['pw'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">權限</th>
            <td class="pp">
                <input type="checkbox" value="1" name="pr[]" <?= (in_array(1, $row['pr'])) ? "checked" : "" ?>>商品分類與管理<br>
                <input type="checkbox" value="2" name="pr[]" <?= (in_array(2, $row['pr'])) ? "checked" : "" ?>>訂單管理<br>
                <input type="checkbox" value="3" name="pr[]" <?= (in_array(3, $row['pr'])) ? "checked" : "" ?>>會員管理<br>
                <input type="checkbox" value="4" name="pr[]" <?= (in_array(4, $row['pr'])) ? "checked" : "" ?>>頁尾版權區管理<br>
                <input type="checkbox" value="5" name="pr[]" <?= (in_array(5, $row['pr'])) ? "checked" : "" ?>>最新消息管理
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="ct"><input type="submit" value="修改">|<input type="reset" value="重置"></div>
</form>
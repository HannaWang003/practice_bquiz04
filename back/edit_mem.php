<?php
$row = $Mem->find($_GET['id']);
?>
<style>
th {
    width: 40%;
}
</style>
<form action="./api/save_mem.php" method="post">
    <table class="all">
        <tr>
            <th class="tt">帳號</th>
            <td class="pp"><?= $row['acc'] ?></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
        </tr>
        <tr>
            <th class="tt">累積金額</th>
            <td class="pp">0 元</td>
        </tr>
        <tr>
            <th class="tt">姓名</th>
            <td class="pp"><input type="text" name="name" id="name" value="<?= $row['name'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp"><input type="text" name="email" id="email" value="<?= $row['email'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">地址</th>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?= $row['addr'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">電話</th>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?= $row['tel'] ?>"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <div class="ct">
        <input type="submit" value="修改"><input type="reset" value="重置"><input type="button" value="取消"
            onclick="history.go(-1)">
    </div>
</form>
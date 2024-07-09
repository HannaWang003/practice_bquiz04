<h2 class="ct">填寫資料</h2>
<?php
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<style>
    th {
        width: 40%;
    }
</style>
<table class="all">
    <tr>
        <th class="tt">登入帳號</th>
        <td class="pp" colspan="4">
            <?= $_SESSION['mem'] ?>
        </td>
    </tr>
    <tr>
        <th class="tt">姓名</th>
        <td class="pp" colspan="4"><input type="text" name="name" id="name" value="<?= $mem['name'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp" colspan="4"><input type="text" name="email" id="email" value="<?= $mem['email'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp" colspan="4"><input type="text" name="addr" id="addr" value="<?= $mem['addr'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp" colspan="4"><input type="text" name="tel" id="tel" value="<?= $mem['tel'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">商品名稱</th>
        <th class="tt">編號</th>
        <th class="tt">數量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
    </tr>
    <?php
    $sum = 0;
    foreach ($_SESSION['cart'] as $id => $qt) {
        $row = $Goods->find($id)
    ?>
        <tr>
            <td class="pp"><?= $row['name'] ?></td>
            <td class="pp"><?= $row['no'] ?></td>
            <td class="pp"><?= $qt ?></td>
            <td class="pp"><?= $row['price'] ?></td>
            <td class="pp"><?= $row['price'] * $qt ?></td>
        </tr>
    <?php
        $sum += $row['price'] * $qt;
    }
    ?>
    <tr>
        <th class="tt" colspan="5">總價: <?= $sum ?></th>
    </tr>
</table>
<div class=" ct">
    <input type="submit" value="確定送出">
    <input type="button" value="返回修改訂單" onclick="history.go(-1)">
</div>
<script>
    $("input[type='submit']").on("click", function() {
        let data = {};
        data.name = $('#name').val();
        data.tel = $('#tel').val();
        data.addr = $('#addr').val();
        data.email = $('#email').val();
        data.total = <?= $sum ?>;
        $.post('./api/checkout.php', data, (no) => {
            alert(`訂購成功\n感謝您的選購`)
            location.href = `?do=order&no=${no}`
        })
    })
</script>
<h2 class="ct">修改商品</h2>
<?php
$row = $Goods->find($_GET['id']);
?>
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <th class="tt">所屬大分類</th>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <th class="tt">所屬中分類</th>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <th class="tt">商品編號</th>
            <td class="pp"><?= $row['no'] ?></td>
        </tr>
        <tr>
            <th class="tt">商品名稱</th>
            <td class="pp"><input type="text" name="name" id="name" value="<?= $row['name'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">商品價格</th>
            <td class="pp"><input type="text" name="price" id="price" value="<?= $row['price'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">規格</th>
            <td class="pp"><input type="text" name="spec" id="spec" value="<?= $row['spec'] ?>"></td>
        </tr>
        <tr>
            <th class=" tt">庫存量</th>
            <td class="pp"><input type="text" name="stock" id="stock" value="<?= $row['stock'] ?>"></td>
        </tr>
        <tr>
            <th class=" tt">商品圖片</th>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <th class="tt">商品介紹</th>
            <td class="pp"><textarea name="intro" id="intro" style="width:90%;height:100px;"><?= $row['intro'] ?></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="ct"><input type="submit" value="修改">|<input type="button" value="重置" onclick='location.reload()'>|<input type="button" onclick="history.go(-1)" value="返回"></div>
</form>
<script>
    getBig(<?= $row['big'] ?>)

    function getBig(big) {
        $.get('./api/get_big.php', {
            big
        }, (res) => {
            $('#big').html(res);
            let big_id = $('#big').val();
            getMid(big_id, <?= $row['mid'] ?>);
        })
    }

    function getMid(big_id, mid) {
        $.get('./api/get_mid.php', {
            big_id,
            mid
        }, (res) => {
            $('#mid').html(res);
        })
    }
    $('#big').on('change', (e) => {
        let big_id = $(e.target).val();
        getMid(big_id);
    })
</script>
<h2 class="ct">新增商品</h2>
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
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <th class="tt">商品名稱</th>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <th class="tt">商品價格</th>
            <td class="pp"><input type="text" name="price" id="price"></td>
        </tr>
        <tr>
            <th class="tt">規格</th>
            <td class="pp"><input type="text" name="spec" id="spec"></td>
        </tr>
        <tr>
            <th class="tt">庫存量</th>
            <td class="pp"><input type="text" name="stock" id="stock"></td>
        </tr>
        <tr>
            <th class="tt">商品圖片</th>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <th class="tt">商品介紹</th>
            <td class="pp"><textarea name="intro" id="intro" style="width:90%;height:100px;"></textarea></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增">|<input type="button" value="重置" onclick='location.reload()'>|<input type="button" onclick="history.go(-1)" value="返回"></div>
</form>
<script>
    getBig()

    function getBig() {
        $.get('./api/get_big.php', (res) => {
            $('#big').html(res);
            let big_id = $('#big').val();
            getMid(big_id);
        })
    }

    function getMid(big_id) {
        $.get('./api/get_mid.php', {
            big_id
        }, (res) => {
            $('#mid').html(res);
        })
    }
    $('#big').on('change', (e) => {
        let big_id = $(e.target).val();
        getMid(big_id);
    })
</script>
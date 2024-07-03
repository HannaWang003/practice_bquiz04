<div class="ct">
    <h2>新增管理帳號</h2>
</div>
<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <th class="tt" style="width:40%">帳號</th>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <th class="tt">權限</th>
            <td class="pp">
                <input type="checkbox" value="1" name="pr[]">商品分類與管理<br>
                <input type="checkbox" value="2" name="pr[]">訂單管理<br>
                <input type="checkbox" value="3" name="pr[]">會員管理<br>
                <input type="checkbox" value="4" name="pr[]">頁尾版權區管理<br>
                <input type="checkbox" value="5" name="pr[]">最新消息管理
            </td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增">|<input type="reset" value="重置"></div>
</form>
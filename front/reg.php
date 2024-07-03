<h2 class="ct">會員註冊</h2>
<style>
th {
    width: 40%;
}
</style>
<form>
    <table class="all">
        <tr>
            <th class="tt">姓名</th>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <th class="tt">帳號</th>
            <td class="pp">
                <input type="text" name="acc" id="acc">
                <input type="button" value="檢測帳號" onclick="chk()">
            </td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <th class="tt">電話</th>
            <td class="pp"><input type="text" name="tel" id="tel"></td>
        </tr>
        <tr>
            <th class="tt">地址</th>
            <td class="pp"><input type="text" name="addr" id="addr"></td>
        </tr>
        <tr>
            <th class="tt">信箱</th>
            <td class="pp"><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="ct"><input type="button" value="註冊" onclick="reg()"><input type="reset" value="重置"></div>
</form>
<script>
function chk() {
    let acc = $('#acc').val();
    $.get('./api/chk.php', {
        acc
    }, (res) => {
        if (parseInt(res) != 0 || acc == "admin") {
            alert(`此帳號${acc}已被註冊，請重新輸入`);
        } else {
            alert(`此帳號${acc}可註冊`)
        }
    })
}

function reg() {
    let acc = $('#acc').val();
    $.get('./api/chk.php', {
        acc
    }, (res) => {
        if (parseInt(res) != 0 || acc == "admin") {
            alert(`此帳號${acc}已被註冊，請重新輸入`);
        } else {
            let mem = {};
            mem.acc = acc;
            mem.pw = $('#pw').val();
            mem.tel = $('#tel').val();
            mem.addr = $('#addr').val();
            mem.email = $('#email').val();
            $.post('./api/save_mem.php', mem, () => {
                alert("註冊完成，請登入")
                location.href = "?do=login";
            })
        }
    })

}
</script>
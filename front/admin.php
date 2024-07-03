<h2 class="ct">管理登入</h2>
<table class="all">
    <tr>
        <th class="tt" style="width:40%;">帳號</th>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <th class="tt">密碼</th>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <th class="tt">驗證碼</th>
        <td class="pp">
            <?php
            $a = rand(10, 99);
            $b = rand(10, 99);
            $_SESSION['ans'] = $a + $b;
            echo $a . "+" . $b . "= ";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct"><button onclick="login('admin')">確認</button></div>
<script>
    function login(table) {
        let ans = $('#ans').val();
        if (ans != <?= $_SESSION['ans'] ?>) {
            alert("對不起，您輸入的驗證碼有誤請您重新登入");
        } else {
            $.post('./api/login.php', {
                acc: $('#acc').val(),
                pw: $('#pw').val(),
                table
            }, (res) => {
                if (parseInt(res) == 1) {
                    alert("登入成功");
                    location.href = "back.php";
                } else {
                    alert("帳號或密碼錯誤，請重新輸入")
                }
            })
        }
    }
</script>
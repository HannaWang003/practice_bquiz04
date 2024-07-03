<?php
if (isset($_POST['bottom'])) {
    $Bot->save(['id' => 1, 'bottom' => $_POST['bottom']]);
}
?>
<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <th class="tt">頁尾宣告內容</th>
            <td class="pp"><input type="text" name="bottom" id="" value="<?= $Bot->find(1)['bottom'] ?>"
                    style="width:80%"></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"></div>
</form>
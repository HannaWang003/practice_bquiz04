<h2 class="ct">商品分類</h2>
<div class="ct"><label>新增大分類</label><input type="text" name="big" id="big"><button onclick="addType('big')">新增</button>
</div>
<div class="ct"><label>新增中分類</label>
    <select name="bigs" id="bigs">
        <?php
        if ($Type->count(['big_id' => 0]) != 0) {
            $bigs =  $Type->all(['big_id' => 0]);
            foreach ($bigs as $big) {
        ?>
                <option value="<?= $big['id'] ?>"><?= $big['name'] ?></option>
        <?php
            }
        }
        ?>

    </select>
    <input type="text" name="mid" id="mid"><button onclick="addType('mid')">新增</button>
</div>

<table class="all">
    <?php
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt" style="width:70%"><?= $big['name'] ?></td>
            <td class="tt" style="text-align:center"><button onclick="edit(this,<?= $big['id'] ?>)">修改</button><button onclick="del('type',<?= $big['id'] ?>)">刪除</button></td>
        </tr>
        <?php
        $mids = $Type->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <td class="pp" style="text-align:center"><?= $mid['name'] ?></td>
                <td class="pp" style="text-align:center"><button onclick="edit(this,<?= $mid['id'] ?>)">修改</button><button onclick="del('type',<?= $mid['id'] ?>)">刪除</button></th>
            </tr>
    <?php
        }
    }
    ?>
</table>
<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr>
        <th class="tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">庫存量</th>
        <th class="tt">狀態</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    $goods = $Goods->all();
    foreach ($goods as $g) {
    ?>
        <tr>
            <td class="pp" style="width:70%"><?= $g['no'] ?></td>
            <td class="pp" style="width:70%"><?= $g['name'] ?></td>
            <td class="pp" style="width:70%"><?= $g['stock'] ?></td>
            <td class="pp" style="width:70%"><?= ($g['sh'] == 1) ? "販售中" : "已下架"; ?></td>
            <td class="pp" style="text-align:center">
                <button onclick="location.href='?do=edit_goods&id=<?= $g['id'] ?>'">修改</button>
                <button onclick="del('goods',<?= $g['id'] ?>)">刪除</button><br>
                <button onclick="sw(<?= $g['id'] ?>,1)">上架</button><button onclick="sw(<?= $g['id'] ?>,0)">下架</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>


<script>
    function addType(type) {
        switch (type) {
            case "big":
                $.post('./api/save_type.php', {
                    name: $('#big').val(),
                    big_id: 0
                }, () => {
                    location.reload();
                })
                break;
            case "mid":
                $.post('./api/save_type.php', {
                    name: $('#mid').val(),
                    big_id: $('#bigs').val()
                }, () => {
                    location.reload();
                })
                break;
        }

    }

    function edit(dom, id) {
        let text = $(dom).parent().prev().text();
        let name = prompt("請輸入欲修改的名稱:", text);
        if (name) {
            $.post('./api/save_type.php', {
                name,
                id
            }, () => {
                location.reload();
            })
        }
    }

    function del(table, id) {
        $.get('./api/del.php', {
            table,
            id
        }, () => {
            location.reload();
        })
    }

    function sw(id, sh) {
        $.post('./api/sw.php', {
            id,
            sh
        }, () => {
            location.reload();
        })
    }
</script>
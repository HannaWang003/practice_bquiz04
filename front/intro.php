<?php
$row = $Goods->find($_GET['id']);
$type = $Type->find($row['big'])['name'] . " > " . $Type->find($row['mid'])['name'];
?>
<style>
    .all {
        display: flex;
    }

    .all>div:nth-child(1) {
        width: 60%;
        padding: 5px;
        margin: 1px;
    }

    .all>div:nth-child(2) {
        width: 40%;
        display: flex;
        flex-wrap: wrap;

        div {
            width: 100%;
            border: 2px solid #fff;
        }

    }
</style>
<div class="all" style="margin:auto;">
    <div class="pp"><img src="./img/<?= $row['img'] ?>" style="width:100%;"></div>
    <div>
        <div class="pp">分類: <?= $type ?></div>
        <div class="pp">編號: <?= $row['no'] ?></div>
        <div class="pp">價格: <?= $row['price'] ?></div>
        <div class="pp">詳細說明: <?= $row['intro'] ?></div>
        <div class="pp">庫存量: <?= $row['stock'] ?></div>
    </div>
</div>
<div class="tt" style="width:90%;margin:auto;display:flex;align-items:center;justify-content:center;">
    購買數量: <input type="number" id="qt" value="1"><img src="./icon/0402.jpg" onclick="buycart(<?= $row['id'] ?>)">
</div>
<script>
    function buycart(id) {
        let qt = $('#qt').val();
        location.href = `?do=buycart&id=${id}&qt=${qt}`;
    }
</script>
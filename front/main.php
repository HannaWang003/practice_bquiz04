<?php
$type = $_GET['type'] ?? 0;
if ($type != 0) {
    $t = $Type->find($type);
    if ($t['big_id'] == 0) {
        $nav = $t['name'];
        $goods = $Goods->all(['sh' => 1, 'big' => $t['id']]);
    } else {
        $nav = $Type->find('big_id')['name'] . " > " . $t['name'];
        $goods = $Goods->all(['sh' => 1, 'mid' => $t['id']]);
    }
} else {
    $nav = "全部商品";
    $goods = $Goods->all(['sh' => 1]);
}
?>
<style>
    .all {
        display: flex;
    }

    .all>div:nth-child(1) {
        width: 35%;
        padding: 15px;
        margin: 1px;
    }

    .all>div:nth-child(2) {
        width: 65%;
        padding: 3px 5px;
        margin: 1px;
        display: flex;
        flex-wrap: wrap;
    }

    .all>div:nth-child(2) div {
        width: 100%;
        border: 2px solid #fff;
    }
</style>
<h2><?= $nav ?></h2>
<?php
foreach ($goods as $g) {
?>
    <div class="all">
        <div class="pp"><a href="?do=intro&id=<?= $g['id'] ?>"><img src="./img/<?= $g['img'] ?>" style="width:100%;"></a>
        </div>
        <div>
            <div class="tt ct"><?= $g['name'] ?></div>
            <div class="pp">價錢: <?= $g['price'] ?><a href="?do=buycart&id=<?= $g['id'] ?>&qt=1" style="float:right;"><img src="./icon/0402.jpg"></a></div>
            <div class="pp">規格: <?= $g['spec'] ?></div>
            <div class="pp">簡介: <?= $g['intro'] ?></div>
        </div>
    </div>

<?php
}
?>
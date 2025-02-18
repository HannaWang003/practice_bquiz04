<?php
include_once "./api/db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/js.js"></script>
    <script src="./js/jquery-3.4.1.js"></script>
</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        <div id="top" style="display:flex;justify-content:space-between;">
            <a href="index.php" style="width:40%;">
                <img src="./icon/0416.jpg" style="width:100%;">
            </a>
            <div style="padding:10px;">
                <a href="index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                if (isset($_SESSION['mem'])) {
                ?>
                    <a href="./api/logout.php?do=mem">登出</a> |
                <?php
                } else {
                ?>
                    <a href="?do=login">會員登入</a> |
                <?php
                }
                if (isset($_SESSION['admin'])) {
                ?>
                    <a href="back.php">返回管理</a>
                <?php
                } else {
                ?>
                    <a href="?do=admin">管理登入</a>
                <?php
                }
                ?>
            </div>
        </div>
        <marquee behavior="" direction="">年終特賣會開跑了 &nbsp; 情人節特惠活動</marquee>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <div class="ww"><a href="?type=0">全部商品(<?= $Goods->count(['sh' => 1]) ?>)</a></div>
                <?php
                $bigs = $Type->all(['big_id' => 0]);
                foreach ($bigs as $big) {
                ?>
                    <div class="ww">
                        <a href="?type=<?= $big['id'] ?>"><?= $big['name'] ?>(<?= $Goods->count(['big' => $big['id']]) ?>)</a>
                        <?php
                        $mids = $Type->all(['big_id' => $big['id']]);
                        foreach ($mids as $mid) {
                        ?>
                            <div class="s"><a href="?type=<?= $mid['id'] ?>" style="background:lightgreen;color:white;position:relative;left:20px;z-index:10;"><?= $mid['name'] ?>(<?= $Goods->count(['mid' => $mid['id']]) ?>)</a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>

            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">
            <?php
            $do = ($_GET['do']) ?? "main";
            $file = "./front/$do.php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "./front/main.php";
            }
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(./icon/bot.png); color:#FFF;" class="ct">
            <?= $Bot->find(1)['bottom'] ?></div>
    </div>

</body>

</html>
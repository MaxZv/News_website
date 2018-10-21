<?php
?>
<!--<!doctype html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<div class="content">
<div class="container col-lg-4"></div>
<div class="container col-lg-4">

    <?php
    foreach ($_SESSION['result_category'] as $item){
        if($_GET['category_id'] == $item['category_id']){
            echo '<H1>' . $item['category_name'] . '</H1><br/><br/>';
        }
    }
    foreach ($data as $new){
        echo $new['short_description'] . '<br/>';
        echo '<a href="' . myLink('news', $new['news_id']) . '">Подробнее</a> <hr/>';
    }?>

    <nav>
        <ul class="pagination justify-content-center">
            <?php if($_GET['page'] == 1){?>
                <li class="page-item"><a class="page-link" href="/Project/index.php?route=category&category_id=<?php echo $new['category_id']?>&page=<?php echo ($_GET['page'] + 1);?>">Слудующая</a></li>
            <?php }elseif($_GET['page'] != $_SESSION['pages'] && $_GET['page'] != 1){?>
                <li class="page-item"><a class="page-link" href="/Project/index.php?route=category&category_id=<?php echo $new['category_id']?>&page=<?php echo ($_GET['page'] - 1);?>">Предыдущая</a></li>
                <li class="page-item"><a class="page-link" href="/Project/index.php?route=category&category_id=<?php echo $new['category_id']?>&page=<?php echo ($_GET['page'] + 1);?>">Слудующая</a></li>
            <?php }else{?>
                <li class="page-item"><a class="page-link" href="/Project/index.php?route=category&category_id=<?php echo $new['category_id']?>&page=<?php echo ($_GET['page'] - 1);?>">Предыдущая</a></li>
                <li class="page-item"><a class="page-link" href="/Project/index.php?route=category&category_id=<?php echo $new['category_id']?>&page=1">К началу</a></li>
            <?php }?>
        </ul>
    </nav>
</div>
<!--</body>-->
<!--</html>-->

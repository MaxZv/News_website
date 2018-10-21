<?php
getHeader();
$count_data = mysqli_fetch_assoc(mysqli_query(getConnect(), "SELECT COUNT(*) AS kol FROM table_news WHERE category_id=1"));

$pages = ceil($count_data['kol']/2);
$_SESSION['pages'] = $pages;
if(empty($_GET['page'])){
    $_GET['page'] = 1;
}
for($i = 1; $i <= $_SESSION['pages']; $i++) {
    if($_GET['page'] == $i) {
        $num = 2 * ($i - 1);
        $ask_categ_news = "SELECT * FROM table_news WHERE category_id='".$_GET['category_id']."'ORDER BY news_id DESC LIMIT " . $num . ",2";
        $query = mysqli_query(getConnect(), $ask_categ_news);
        while ($res[] = mysqli_fetch_assoc($query)) {
            $category_news = $res;
        }


        getView('category', $category_news);
    }
}
getFooter();
?>








<?php
//getHeader();
//$categ_news = "SELECT * FROM table_news WHERE category_id='".$_GET['category_id']."'";
//$query = mysqli_query($connect, $categ_news);
//while($res[] = mysqli_fetch_assoc($query)) {
//    $result = $res;
//}
//$_SESSION['categ_news'] = $result;
//getView('category');
//
//getFooter()
//?>
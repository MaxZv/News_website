<?php
getHeader();
$count_data = mysqli_fetch_assoc(mysqli_query(getConnect(), "SELECT COUNT(*) AS kol FROM table_news"));

$pages = ceil($count_data['kol']/2);
$_SESSION['pages'] = $pages;
if(empty($_GET['page'])){
    $_GET['page'] = 1;
}
for($i = 1; $i <= $_SESSION['pages']; $i++) {
    if($_GET['page'] == $i) {
        $num = 2 * ($i - 1);
        $ask_last_news = "SELECT * FROM table_news ORDER BY news_id DESC LIMIT " . $num . ",2";
        $query = mysqli_query(getConnect(), $ask_last_news);
        while ($res[] = mysqli_fetch_assoc($query)) {
            $last_news = $res;
        }


        getView('home', $last_news);
    }
}
getFooter();


?>
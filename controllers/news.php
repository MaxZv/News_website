<?php
getHeader();
$ask_full_new = "SELECT * FROM table_news WHERE news_id='".$_GET['news_id']."'";
$query = mysqli_query(getConnect(), $ask_full_new);
$res = mysqli_fetch_assoc($query);
$full_new = $res;
getView('news', $full_new);
getFooter();
?>
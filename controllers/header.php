<?php
$askCategory = "SELECT * FROM table_category";
$query = mysqli_query(getConnect(), $askCategory);
while($res[] = mysqli_fetch_assoc($query)){
    $_SESSION['result_category'] = $res;
}

getView('header');
?>
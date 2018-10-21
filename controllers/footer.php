<?php
getHeader();
$askCateg = "SELECT * FROM table_category";
$queryCateg = mysqli_query(getConnect(), $askCateg);
while($resCateg[] = mysqli_fetch_assoc($queryCateg)){
    $categoryResult = $resCateg;
}
getView('footer', $categoryResult);
?>
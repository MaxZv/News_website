<?php
getHeader();
$ask_info = "SELECT * FROM table_information";
$query = mysqli_query(getConnect(), $ask_info);
while($res[] = mysqli_fetch_assoc($query)){
$info_res = $res;
}
//var_dump($info_res);
getView('information', $info_res);
getFooter();
?>
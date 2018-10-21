<!--<script>-->
<!--    function fresh() {-->
<!--        location.reload();-->
<!--    }-->
<!--    fresh(1);-->
<!--</script>-->
<?php
getHeader();
//var_dump($_SESSION['updateInfo']);
//unset($_SESSION);
//var_dump($_POST['update_category_name']);
//var_dump($_SESSION);
//var_dump($_POST);
//var_dump($_POST['update_category_id']);

if(!isset($_SESSION['auth'])){
    getViewAdmin('auth');
}

//Авторизация админа

$ask_auth = "SELECT login, password FROM table_auth";
$query_auth = mysqli_query(getConnect(), $ask_auth);
$res_auth[] = mysqli_fetch_assoc($query_auth);
//var_dump($res_auth[0]['login']);
//var_dump($_POST['login']);
if(empty($_SESSION['auth'])) {
    if (!empty($_POST['login']) && !empty($_POST['pass']) && $_POST['login'] == $res_auth[0]['login'] && $_POST['pass'] == $res_auth[0]['password']) {
        $_SESSION['auth'] = 'Admin';
    }
}

//Обработка форм и подключение вьюх
if(!empty($_SESSION['auth'])) {

    $query_all = "SELECT * FROM table_news";
    $query = mysqli_query(getConnect(), $query_all);
    while ($res[] = mysqli_fetch_assoc($query)) {
        $all_news = $res;
    }

    $ask_category = "SELECT * FROM table_category";
    $query_category = mysqli_query(getConnect(), $ask_category);
    while ($res_categ[] = mysqli_fetch_assoc($query_category)) {
        $categories = $res_categ;
    }

    if (!empty($_POST)) {
        // var_dump($_POST);
        foreach ($_POST as $key => $item) {

            if ($item == 'Update') {
                $upd_key = substr($key, 6);
                //var_dump($upd_key);
                $ask_upd = "SELECT * FROM table_news WHERE news_id='" . $upd_key . "'";
                $upd_res = mysqli_fetch_assoc(mysqli_query(getConnect(), $ask_upd));
                $upd_arr = array($upd_res, $categories);
                getViewAdmin('Update', $upd_arr);
            } elseif ($item == 'Delete') {
                $del_key = substr($key, 6);
                $del_query = "DELETE FROM table_news WHERE news_id='" . $del_key . "'";
                mysqli_query(getConnect(), $del_query);
                getViewAdmin('Delete', $del_key);
            }
        }

    }
//форма изменения новостей
    if (isset($_POST['UpdSend'])) {
        $ins = "UPDATE table_news SET category_id='" . $_POST['upd_categ'] . "', news_name='" . $_POST['upd_name'] . "', description='" . $_POST['upd_descrip'] . "', short_description='" . $_POST['upd_short_descrip'] . "', news_image='" . $_POST['upd_news_image'] . "', date='" . $_POST['upd_date'] . "', title='" . $_POST['upd_title'] . "', meta_description='" . $_POST['upd_meta'] . "' WHERE news_id='" . $_POST['upd_id'] . "'";
        mysqli_query(getConnect(), $ins);
    }

//форма создания новости
    if (isset($_POST['createNew'])) {
        getViewAdmin('create');
    }

//обработка формы создания новости
    if (!empty($_POST['create_categ']) || !empty($_POST['create_name']) || !empty($_POST['create_descrip']) || !empty($_POST['create_short_descrip']) || !empty($_POST['create_news_image']) || !empty($_POST['create_date']) || !empty($_POST['create_title']) || !empty($_POST['create_meta'])) {

        $crt = "INSERT INTO table_news SET category_id='" . $_POST['create_categ'] . "', news_name='" . $_POST['create_name'] . "', description='" . $_POST['create_descrip'] . "', short_description='" . $_POST['create_short_descrip'] . "', news_image='" . $_POST['create_news_image'] . "', date='" . $_POST['create_date'] . "', title='" . $_POST['create_title'] . "', meta_description='" . $_POST['create_meta'] . "'";
        mysqli_query(getConnect(), $crt);
    }



//форма создания категории
    if (isset($_POST['createCategory'])) {
        getViewAdmin('createCategory');
    }
//форма редактировния категорий
    if(isset($_POST['upDelCategory'])){
       $_SESSION['upDelCategory'] = true;
    }

    if(!empty($_SESSION['upDelCategory'])){
        getViewAdmin('upDelCategory', $categories);
       // unset($_SESSION['upDelCategory']);
    }

    if(!empty($_SESSION['updateCategory'])){
        getViewAdmin('updateCateg', $categories);
    unset($_SESSION['updateCategory']);
unset($_SESSION['upDelCategory']);
    }

//удаление категорий
    if(!empty($_SESSION['deleteCategory'])){

        $del_category = "DELETE FROM table_category WHERE category_id='".$_SESSION['deleteCategory']."'";
        mysqli_query(getConnect(), $del_category);
        unset($_SESSION['deleteCategory']);
        unset($_SESSION['upDelCategory']);
    }

//Фрма создания инфо
    if(isset($_POST['createInfo'])){
        getViewAdmin('createInfo');
    }

    //Форма редактирования инфо

    if(isset($_POST['upDelInfo'])){
        $_SESSION['upDelInfo'] = true;

    }

    if(!empty($_SESSION['upDelInfo'])){
        $askInfo = "SELECT * FROM table_information";
        $queryInform =  mysqli_query(getConnect(), $askInfo);
        while($infoRes[] = mysqli_fetch_assoc($queryInform)){
            $resInfo = $infoRes;
        }

        getViewAdmin('upDelInfo', $resInfo);
    }
    if(!empty($_SESSION['updateInfo'])){
        getViewAdmin('updateInfo', $resInfo);
    }


//Обработка формы создания категории
    if (!empty($_POST['category_name']) || !empty($_POST['category_image']) || !empty($_POST['category_title']) || !empty($_POST['category_meta_description']) || !empty($_POST['category_description'])) {

        $crtCateg = "INSERT INTO table_category SET category_name='" . $_POST['category_name'] . "', category_image='" . $_POST['category_image'] . "', title='" . $_POST['category_title'] . "', meta_description='" . $_POST['category_meta_description'] . "', category_description='" . $_POST['category_description'] . "'";
        mysqli_query(getConnect(), $crtCateg);
    }

    //Обработка формы редактировния категорий
    if(!empty($_POST['update_category_name']) || !empty($_POST['update_category_image']) || !empty($_POST['update_category_title']) || !empty($_POST['update_category_meta_description']) || !empty($_POST['update_category_description'])){
        $updCateg = "UPDATE table_category SET category_name='" . $_POST['update_category_name'] . "', category_image='" . $_POST['update_category_image'] . "', title='" . $_POST['update_category_title'] ."', meta_description='" . $_POST['update_category_meta_description'] ."', category_description='" . $_POST['update_category_description'] ."' WHERE category_id ='".$_POST['update_category_id']."'";
        mysqli_query(getConnect(), $updCateg);
    }

    //Обработка формы создания инфо
    if(!empty($_POST['createInfoName']) || !empty($_POST['createInfo']) || !empty($_POST['createInfoTitle']) || !empty($_POST['createInfoMeta'])){
        $createInfo = "INSERT INTO table_information SET inform_name = '".$_POST['createInfoName']."', title = '".$_POST['createInfoTitle']."', inform_description = '".$_POST['createInfo']."', meta_description = '".$_POST['createInfoMeta']."'";
        mysqli_query(getConnect(), $createInfo);
    }

    //Обработка формы редактирования инфо
    if(!empty($_POST['info_name']) || !empty($_POST['info_title']) || !empty($_POST['info_description']) || !empty($_POST['info_meta_description'])){
        $updInfo = "UPDATE table_information SET inform_name='".$_POST['info_name']."', title='".$_POST['info_title']."', inform_description='".$_POST['info_description']."', meta_description='".$_POST['info_meta_description']."' WHERE inform_id='".$_SESSION['updateInfo']."'";
        mysqli_query(getConnect(), $updInfo);
    }
    if(isset($_POST['result_update_info'])){
        session_unset();
        $_SESSION['auth'] = 'Admin';
    }

if(!empty($_SESSION['deleteInfo'])){
        $delInfo = "DELETE FROM table_information WHERE inform_id='".$_SESSION['deleteInfo']."'";
        mysqli_query(getConnect(), $delInfo);
        session_unset();
    $_SESSION['auth'] = 'Admin';
}

    getViewAdmin('admin', $all_news);
}

getFooter();





?>
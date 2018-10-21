<?php
//var_dump($data);
if(!isset($_SESSION['updateCategory'])){
?>
<div>
    <table border="1" cellpadding="4" cellspacing="0">
        <tr>
            <td>Id</td>
            <td>Имя</td>
            <td>Картинка</td>
            <td>Заголовок</td>
            <td>Мета-данные</td>
            <td>Описание категории</td>
            <td></td>
        </tr>
        <?php foreach ($data as $key => $value){
            ?>

        <tr>
            <td><?php echo $value['category_id'] ?></td>
            <td><?php echo $value['category_name'] ?></td>
            <td><?php echo $value['category_image'] ?></td>
            <td><?php echo $value['title'] ?></td>
            <td><?php echo $value['meta_description'] ?></td>
            <td><?php echo $value['category_description'] ?></td>
            <td>
                <form method="post">
                    <button type="submit" name="updateCategory<?php echo $value['category_id']?>">Редактировать</button>
                </form>
                <form method="post">
                    <button type="submit" name="deleteCategory<?php echo $value['category_id']?>">Удалить</button>
                </form>
            </td>
        </tr>
        <?php if(isset($_POST['updateCategory'. $value['category_id']])){
            $_SESSION['updateCategory'] = $value['category_id'];
            }
            if(isset($_POST['deleteCategory'. $value['category_id']])){
                $_SESSION['deleteCategory'] = $value['category_id'];
            }
        }
//        if(isset($_POST['deleteCategory' . $value['category_id']])){
//            $_SESSION['deleteCategory'] = $value['category_id'];
//        }
        ?>
    </table>
    <br/>
</div>
<?php } ?>
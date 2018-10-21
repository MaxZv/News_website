<?php
?>
<div>
    <table border="1" cellpadding="4" cellspacing="0">
        <tr>
            <td>Название</td>
            <td>Заголовок</td>
            <td>Описание</td>
            <td>Мета-данные</td>
            <td></td>
        </tr>
        <?php
        foreach ($data as $valInfo){
            //var_dump($valInfo);
        ?>
            <tr>
                <td><?php echo $valInfo['inform_name'] ?></td>
                <td><?php echo $valInfo['title'] ?></td>
                <td><?php echo $valInfo['inform_description'] ?></td>
                <td><?php echo $valInfo['inform_meta_description'] ?></td>
                <td><form method="post"><button type="submit" name="updateInfo<?php echo $valInfo['inform_id']?>">Редактировать</button></form><br/><form method="post"><button type="submit" name="deleteInfo<?php echo $valInfo['inform_id']?>">Удалить</button></form></td>
            </tr>
        <?php if(isset($_POST['updateInfo' . $valInfo['inform_id']])){
            $_SESSION['updateInfo'] = $valInfo['inform_id'];
           // uset($_SESSION['deleteInfo']);
            }
            if(isset($_POST['deleteInfo' . $valInfo['inform_id']])){
                $_SESSION['deleteInfo'] = $valInfo['inform_id'];
              //  unset($_SESSION['updateInfo']);
            }
        } ?>
    </table>
</div>

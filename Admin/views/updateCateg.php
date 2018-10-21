<?php
//var_dump($data);
//var_dump($_SESSION['updateCategory']);
foreach ($data as $key => $value){
    if($value['category_id'] == $_SESSION['updateCategory']){?>
        <form method="post">
            <input type="hidden" name="update_category_id" value="<?php echo $value['category_id']?>" ><br/>
            <input type="text" name="update_category_name" value="<?php echo $value['category_name']?>" ><br/>
            <input type="text" name="update_category_image" value="<?php echo $value['category_image']?>"><br/>
            <input type="text" name="update_category_title" value="<?php echo $value['title']?>"><br/>
            <textarea name="update_category_meta_description"><?php echo $value['meta_description']?></textarea><br/>
            <textarea name="update_category_description"><?php echo $value['category_description']?></textarea><br/>
            <input type="submit" name="update_category_submit">
        </form>
   <?php }
}?>

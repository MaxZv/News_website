<?php
foreach ($data as $updateData){
    if($updateData['inform_id'] == $_SESSION['updateInfo']){?>
      <form method="post">
          <input type="text" name="info_name" value="<?php echo $updateData['inform_name']?>"><br/>
          <input type="text" name="info_title" value="<?php echo $updateData['title']?>"><br/>
          <textarea name="info_description"><?php echo $updateData['inform_description']?></textarea><br/>
          <textarea name="info_meta_description"><?php echo $updateData['meta_description']?></textarea><br/>
          <input type="submit" name="result_update_info">
      </form>
 <?php   }
 //var_dump($updateData);
}
?>
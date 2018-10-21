<?php
//var_dump($data);
?>
<form method="post">
    <input type="hidden" name="upd_id" value="<?php echo $data[0]['news_id']?>">
    <input type="text" name="upd_categ" value="<?php echo $data[0]['category_id']?>"><br/>
    <textarea name="upd_name"><?php echo $data[0]['news_name']?></textarea><br/>
    <textarea name="upd_descrip"><?php echo $data[0]['description']?></textarea><br/>
    <textarea name="upd_short_descrip"><?php echo $data[0]['short_description']?></textarea><br/>
    <textarea name="upd_news_image"><?php echo $data[0]['news_image']?></textarea><br/>
    <input type="text" name="upd_date" value="<?php echo $data[0]['date']?>"><br/>
    <textarea name="upd_title"><?php echo $data[0]['title']?></textarea><br/>
    <textarea name="upd_meta"><?php echo $data[0]['meta_description']?></textarea><br/>
    <input type="submit" name="UpdSend">
</form>

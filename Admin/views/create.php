<?php
?>
<form method="post">
    <input type="text" name="create_categ" placeholder="Категория"><br/>
    <textarea name="create_name" placeholder="Название новости"></textarea><br/>
    <textarea name="create_descrip"placeholder="Новость"></textarea><br/>
    <textarea name="create_short_descrip" placeholder="Короткое описание новости"></textarea><br/>
    <textarea name="create_news_image" placeholder="Ссылка на картику к новости"></textarea><br/>
    <input type="hidden" name="create_date" value="<?php echo date("d.m.y");?>"><br/>
    <textarea name="create_title" placeholder="Заголовок"></textarea><br/>
    <textarea name="create_meta" placeholder="Мета-данные"></textarea><br/>
    <input type="submit" name="createSend">
</form>

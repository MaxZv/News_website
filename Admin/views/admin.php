<?php
echo '<div align="right"><form method="post"><button type="submit" name="createNew">Создать новость</button><form method="post"><button type="submit" name="createCategory">Создать категорию</button></form><form method="post"><button type="submit" name="upDelCategory">Редактировать категорию</button><form method="post"><button type="submit" name="createInfo">Создать новое инфо</button><form method="post"><button type="submit" name="upDelInfo">Редактировать инфо</button></div>';

echo '<div align="center"><table border="1" cellpadding="4" cellspacing="0">';
echo '<tr>
<td>Категория</td>
<td>Название</td>
<td>Новость</td>
<td>Краткое описание</td>
<td>Ссылка на изображение</td>
<td>Дата новости</td>
<td>Заголовок</td>
<td>Мета-данные</td>
<td></td>
</tr>';
foreach ($data as $value) {
    echo '<tr class="all_news">';
    echo '<td width="20">';
    echo $value['category_id'];
    echo '</td>';
    echo '<td width="120">';
    echo $value['news_name'];
    echo '</td>';
    echo '<td width="120">';
    echo substr($value['description'], 0, 300);
    echo '</td>';
    echo '<td width="120">';
    echo substr($value['short_description'], 0, 150);
    echo '</td>';
    echo '<td width="120">';
    echo substr($value['news_image'], 0, 20);
    echo '</td>';
    echo '<td width="120">';
    echo $value['date'];
    echo '</td>';
    echo '<td width="120">';
    echo $value['title'];
    echo '</td>';
    echo '<td width="120">';
    echo $value['meta_description'];
    echo '</td>';
    echo '<td width="50">';
    echo '<form method="Post">
<input type="submit" name="update'.$value['news_id'].'" value="Update">
<input type="submit" name="delete'.$value['news_id'].'" value="Delete">

</form>';
    echo '</td>';
    echo '</tr>';


}
echo '</table></div>';

?>
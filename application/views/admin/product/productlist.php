<script type="text/javascript">
    jQuery(document).ready(function(){
        $('.input_search, input#email').focus(function () {
            if ($(this).val() == $(this).attr('title')) {
                $(this).val('');
            }
        })
            .blur(function () {
                if ($(this).val() == '') {
                    $(this).val($(this).attr('title'));
                }
            });
    });
</script>
<a class="button" href="/admin/product/create">Добавить продукт</a>
<br/>
<form action="" method="get">
    <input class="input_search" name="search" type="text" value="Поиск по артикулу" title="Поиск по артикулу">
    <input type="submit" value="Искать"/>
</form>
<? if (!empty($product[0])): ?>
<div style="display: inline;">
    <?php
    $pager='';
    foreach($pages as $page)
    $pager.=$page;
    echo $pager?>
</div>
<table class="extended">
    <thead>
        <tr>
            <th>Артикул</th>
            <th>Изображение</th>
            <th>Коллекция</th>
            <th>Управление</th>
        </tr>
    </thead>
    <tbody>
            <? foreach ($product as $prod): ?>
        <tr>
            <td>
                        <?php echo $prod->artikul ?>
            </td>
            <td><img height="135" src="/uploads/products/<?=$prod->image_big?> " alt="<?php echo $prod->image_big?> "> </img></td>

            <td><?php echo $prod->category ?></td>
            <td>
                <a href="/admin/product/view/<?php echo $prod->id ?>">Подробно</a>
                <a href="/admin/product/edit/<?php echo $prod->id ?>">Редактировать</a>
                <a href="/admin/product/delete/<?php echo $prod->id ?>" onclick="return confirm('Удалить продукт с ID=<?php echo $prod->id ?>?')">Удалить</a>
            </td>
        </tr>
            <? endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Артикул</th>
            <th>Изображение</th>
            <th>Коллекция</th>
            <th>Управление</th>
        </tr>
    </tfoot>
</table>
<div class="clear"></div>


<? else: ?>
Продуктов в базе нету
<? endif ?>


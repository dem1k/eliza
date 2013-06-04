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
            <th width="100px">Артикул</th>
            <th >Название</th>
            <th >Категория</th>
            <th width="48px"></th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($product as $prod): ?>
        <tr>
            <td>
                        <?php echo $prod->artikul ?>
            </td>
            <td>
                        <?php echo $prod->name ?>
            </td>

            <td><?php echo $prod->category ?></td>
            <td>
<!--                <a href="/admin/product/view/--><?php //echo $prod->id ?><!--">Подробно</a>-->
                <a class="edit_btn" title="Редактировать" href="/admin/product/edit/<?php echo $prod->id ?>" >Редактировать</a>
                <a class="delete_btn" title="Удалить" href="/admin/product/delete/<?php echo $prod->id ?>" onclick="return confirm('Удалить продукт с ID=<?php echo $prod->id ?>?')">Удалить</a>
            </td>
        </tr>
            <? endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Артикул</th>
            <th>Название</th>
            <th>Категория</th>
            <th></th>
        </tr>
    </tfoot>
</table>
<div class="clear"></div>


<? else: ?>
Продуктов еще нет
<? endif ?>


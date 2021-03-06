<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
    $('input:checkbox').live('click',function(){

        $.post('/admin/article/main_page/',{
            art_id:$(this).attr('art_id'),
            main_page:$(this).attr('checked')?1:0
        })


    })
</script>

<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Статьи</a></li>
        <li><a href="#tabs-2">Категории</a></li>
    </ul>
    <div id="tabs-1">
        <a class="button" href="/admin/article/create/">Создать статью</a> <br/>
        <table class="extended" width="100%" border="1px solid " cellspacing="0" cellpadding="0">
            <thead>
            <th width="20px">ID</th>
            <th>Название</th>
            <th width="80px" align="middle">Категория</th>
            <th align="middle">Главная</th>
            <th width="48px"></th>
            </thead>
            <tbody>
                <?php foreach ($articles as $article):?>
                <tr>
                    <td><?=$article['id']?>
                    </td>
                    <td><?=$article['name']?>
                    </td>
                    <td align="middle" ><?=$article['category']?$article['category']:'Нет'?>
                    </td>
                    <td >
                        <input type="checkbox" class="main_" art_id="<?=$article['id']?>" <?=$article['main_page']?'checked="'.$article['main_page'].'"':''?>/>
                    </td>
                    <td>
                        <a class="edit_btn" title="Редактировать" href="/admin/article/edit/<?=$article['id']?>/">Редактировать</a>
                       <?php if(!$article['static']):?>
                       <a class="delete_btn" title="Удалить" onclick="return confirm('Удалить cтатью с ID=<?=$article['id']?>')" href="/admin/parametrs/delete/articles/<?=$article['id']?>/">Удалить</a>
                       <?php endif;?>
                    </td>
                </tr>
                <?endforeach;?>
            </tbody>
            <tfoot>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th align="middle">Главная</th>
            <th></th></tfoot>
        </table>

    </div>
    <div id="tabs-2">
        <a class="button" href="/admin/parametrs/create/category_art/">Создать категорию</a> <br/>
        <table  class="extended" width="100%" border="1px solid " cellspacing="0" cellpadding="0">
            <thead>
            <th width="20px">ID</th>
            <th>Название</th>
            <th width="48px"></th>
            </thead>
            <tbody>
                <?php foreach ($categoryes_art as $category):?>
                <tr>
                    <td><?=$category['id']?>
                    </td>
                    <td><?=$category['name']?>
                    </td>
                    <td>
                        <a class="edit_btn" title="Редактировать" href="/admin/parametrs/edit/category_art/<?=$category['id']?>/">Редактировать</a>
                        <a class="delete_btn"  title="Удалить" onclick="return confirm('Удалить категорию с ID=<?=$category['id']?>')" href="/admin/parametrs/delete/category_art/<?=$category['id']?>/">Удалить</a>
                    </td>
                </tr>
                <?endforeach;?>
            </tbody>
            <tfoot> <th>ID</th>
            <th>Название</th>

            <th></th></tfoot>
        </table>

    </div>
</div>
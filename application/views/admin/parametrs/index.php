<script>
    $(document).ready(function() {scroll(0,0);
        $( "#tabs" ).tabs();
        $('#tabs a').click(function(){
            location.hash=$(this).attr('href');
            scroll(0,0);
        })
    });

</script>

<div id="tabs">
    <ul>
        <li><a href="#categories" >Коллекции</a></li>
        <li><a href="#classes" >Группы</a></li>
        <li><a href="#brands" >Бренды</a></li>
        <li><a href="#colors" >Цвета</a></li>
        <li><a href="#rocks" >Вставки</a></li>
    </ul>
    <div id="categories">
        <a class="button" href="/admin/parametrs/create/categories/">Создать колекцию</a> <br/>
        <table width="100%" border="1px solid " cellspacing="0" cellpadding="0">
            <thead>
            <th width="20px">ID</th>
            <th>Название</th>
            <th width="200px">Действие</th>
            </thead>
            <tbody>
                <?php foreach ($categories as $category):?>
                <tr>
                    <td><?=$category['id']?>
                    </td>
                    <td><?=$category['name']?>
                    </td>
                    <td>
                        <a href="/admin/parametrs/edit/categories/<?=$category['id']?>/">Редактировать</a>
                        <a  onclick="return confirm('Удалить коллекцию с ID=<?=$category['id']?>')" href="/admin/parametrs/delete/categories/<?=$category['id']?>/">Удалить</a>
                    </td>
                </tr>
                <?endforeach;?>
            </tbody>
            <tfoot> <th>ID</th>
            <th>Название</th>
            <th>Действие</th></tfoot>
        </table>

    </div>
    <div id="classes">
        <a class="button" href="/admin/parametrs/edit/classes/">Создать Группу</a> <br/>
        <table width="100%" border="1px solid " cellspacing="0" cellpadding="0">
            <thead>
            <th width="20px">ID</th>
            <th>Название</th>
            <th width="200px">Действие</th>
            </thead>
            <tbody>
                <?php foreach ($classes as $class):?>
                <tr>
                    <td><?=$class['id']?>
                    </td>
                    <td><?=$class['name']?>
                    </td>
                    <td>
                        <a href="/admin/class/edit/<?=$class['id']?>/">Редактировать</a>
                        <a  onclick="return confirm('Удалить группу с ID=<?=$class['id']?>')" href="/admin/class/delete/<?=$class['id']?>/">Удалить</a>
                    </td>
                </tr>
                <?endforeach;?>
            </tbody>
            <tfoot> <th>ID</th>
            <th>Название</th>
            <th>Действие</th></tfoot>
        </table>

    </div>
    <div id="brands">
        <a class="button" href="/admin/parametrs/create/brands/">Создать бренд</a> <br/>
        <table width="100%" border="1px solid " cellspacing="0" cellpadding="0">
            <thead>
            <th width="20px">ID</th>
            <th>Название</th>
            <th width="200px">Действие</th>
            </thead>
            <tbody>
                <?php foreach ($brands as $brand):?>
                <tr>
                    <td>
                            <?=$brand['id']?>
                    </td>
                    <td>
                            <?=$brand['name']?>
                    </td>
                    <td>
                        <a href="/admin/brand/edit/<?=$brand['id']?>/">Редактировать</a>
                        <a  onclick="return confirm('Удалить бренд с ID=<?=$brand['id']?>')" href="/admin/brand/delete/<?=$brand['id']?>/">Удалить</a>
                    </td>
                </tr>
                <?endforeach;?>
            </tbody>
            <tfoot> <th>ID</th>
            <th>Название</th>
            <th>Действие</th></tfoot>
        </table>

    </div>
    <div id="colors">
        <a class="button" href="/admin/parametrs/create/colors/">Создать цвет</a> <br/>
        <table width="100%" border="1px solid " cellspacing="0" cellpadding="0">
            <thead>
            <th width="20px">ID</th>
            <th>Название</th>
            <th width="200px">Действие</th>
            </thead>
            <tbody>
                <?php foreach ($colors as $color):?>
                <tr>
                    <td>
                            <?=$color['id']?>
                    </td>
                    <td>
                            <?=$color['name']?>
                    </td>
                    <td>
                        <a href="/admin/parametrs/edit/colors/<?=$color['id']?>/">Редактировать</a>
                        <a  onclick="return confirm('Удалить цвет с ID=<?=$color['id']?>')" href="/admin/parametrs/delete/colors/<?=$color['id']?>/">Удалить</a>
                    </td>
                </tr>
                <?endforeach;?>
            </tbody>
            <tfoot> <th>ID</th>
            <th>Название</th>
            <th>Действие</th></tfoot>
        </table>

    </div>
    <div id="rocks">
        <a class="button" href="/admin/parametrs/create/rocks/">Создать вставку</a> <br/>
        <table width="100%" border="1px solid " cellspacing="0" cellpadding="0">
            <thead>
            <th width="20px">ID</th>
            <th>Название</th>
            <th width="200px">Действие</th>
            </thead>
            <tbody>
                <?php foreach ($rocks as $rock):?>
                <tr>
                    <td><?=$rock['id']?>
                    </td>
                    <td><?=$rock['name']?>
                    </td>
                    <td>
                        <a href="/admin/parametrs/edit/rocks/<?=$rock['id']?>/">Редактировать</a>
                        <a  onclick="return confirm('Удалить вставку с ID=<?=$rock['id']?>')" href="/admin/parametrs/delete/rocks/<?=$rock['id']?>/">Удалить</a>
                    </td>
                </tr>
                <?endforeach;?>
            </tbody>
            <tfoot> <th>ID</th>
            <th>Название</th>
            <th>Действие</th></tfoot>
        </table>

    </div>
</div>
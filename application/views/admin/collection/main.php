<a class="button" href="/admin/category/create">Создать Коллекцию</a>
<br/>

<table class="extended">
    <thead>
    <th>ID</th>
    <th>Название</th>
    <th>Действие</th>
</thead>
<tbody>
    <?php if (!empty($categories)):?>
        <?php foreach($categories as $category):?>
    <tr>
        <td><?=$category['id']?></td>
        <td><?=$category['name']?></td>
        <td><a href="/admin/category/view/<?=$category['id']?>/">Показать</a>
            <a href="/admin/category/edit/<?=$category['id']?>/">Редактировать</a>
            <a href="/admin/category/delete/<?=$category['id']?>/"onclick="return confirm('Удалить коллекцию с ID=<?=$category['id']?>')">Удалить</a></td>
    </tr>
        <?php endforeach?>
    <?php else:?>
    <tr><td></td><td> Еще нет ниодной коллекции !!</td></tr>
    <?php endif;?>
</tbody>
<tfoot>
<th>ID</th>
<th>Название</th>
<th>Действие</th>
</tfoot>
</table>
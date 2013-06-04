<a  class="button add_button" href="/admin/category/create"><span>&nbsp;&nbsp;&nbsp;&nbsp;</span>Добавить</a>
<br/>

<table class="extended">
    <thead>
    <th>ID</th>
    <th>Название</th>
    <th width="48"></th>
</thead>
<tbody>
    <?php if (!empty($categories)):?>
        <?php foreach($categories as $category):?>
    <tr>
        <td><?=$category['id']?></td>
        <td><?=$category['name']?></td>
        <td><a class="open_btn" title="Открыть" href="/admin/category/view/<?=$category['id']?>/">Показать</a>
            <a class="edit_btn" title="Редактировать" href="/admin/category/edit/<?=$category['id']?>/">Редактировать</a>
            <a class="delete_btn" title="Удалить" href="/admin/category/delete/<?=$category['id']?>/"onclick="return confirm('Удалить коллекцию с ID=<?=$category['id']?>')">Удалить</a></td>
    </tr>
        <?php endforeach?>
    <?php else:?>
    <tr><td></td><td> Еще нет ниодной коллекции !!</td></tr>
    <?php endif;?>
</tbody>
<tfoot>
<th>ID</th>
<th>Название</th>
<th></th>
</tfoot>
</table>
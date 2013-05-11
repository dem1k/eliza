<a class="button" href="/admin/baners/create">Добавить банер</a>
<br/>

<table class="extended">
    <thead>
    <th width="150">Картинка</th>
    <th>Заголовок</th>
    <th width="150">Действие</th>
    </thead>
    <tbody>
    <?php if (!empty($baners)):?>
        <?php foreach($baners as $baner):?>
        <tr>
            <td><img style="height: 100px;width: auto;"src="/uploads/images/<?=$baner->image?>"/></td>
            <td><?=$baner->title?></td>
            <td>
<!--                <a href="/admin/baners/view/--><?//=$baner->id?><!--/">Показать</a>-->
                <a href="/admin/baners/update/<?=$baner->id?>/">Редактировать</a>
                <a href="/admin/baners/delete/<?=$baner->id?>/" onclick="return confirm('Удалить ?')">Удалить</a></td>
        </tr>
            <?php endforeach?>
        <?php else:?>
    <tr><td></td><td> Еще нет банеров!!</td></tr>
        <?php endif;?>
    </tbody>
    <tfoot>
    <th>Картинка</th>
    <th>Название</th>
    <th>Действие</th>
    </tfoot>
</table>
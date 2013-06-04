<a class="button" href="/admin/product/create">Создать товар</a>
<br/>

<table class="extended">
    <thead>
    <th>Название</th>
    <th width="48"></th>
    </thead>
    <tbody>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?=$product['name']?></td>
            <td>
                <div>
                    <span>
                        <a class="edit_btn" title="Редактировать"href="/admin/product/edit/<?=$product['id']?>/">Редактировать</a>
                    </span>
                    <span>
                        <a class="delete_btn" title="Удалить" href="/admin/product/delete/<?=$product['id']?>/"
                             onclick="return confirm('Удалить ?')">Удалить</a>
                    </span>
                </div>
            </td>
        </tr>
            <?php endforeach ?>
        <?php else: ?>
    <tr>
        <td></td>
        <td> Еще нет товаров !!</td>
    </tr>
        <?php endif;?>
    </tbody>
    <tfoot>
    <th>Название</th>
    <th></th>
    </tfoot>
</table>
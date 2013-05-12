<form method="get"><table class="extended">
    <tr>
        <td>Статус</td>
        <td><select name="status" >
            <?php foreach($order_statuses as $status):?>
            <option value="<?php echo $status->id?>"
                <?php if($products[0]->status == $status->id) echo "selected"?>>
                <?php echo $status->name?>
            </option>
                <?php endforeach;?>

        </select>
        <input type="submit" value="Изменить" />
    </tr>
    <tr>
        <td>Имя</td>
        <td><?php echo $products[0]->first_name?> <?php echo $products[0]->last_name?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $products[0]->email?></td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td><?php echo $products[0]->phone?></td>
    </tr>
    <tr>
        <td>Город</td>
        <td><?php echo $products[0]->city?></td>
    </tr>
    <tr>
        <td>Хочу узнавать о спецпредложениях</td>
        <td><?php echo $products[0]->deals ? 'Да' : 'Нет'?></td>
    </tr>
    <tr>
        <td>Комментарий к заказу</td>
        <td><?php echo $products[0]->description?></td>
    </tr>
    <tr></tr>
</table>
</form>
<?php foreach ($products as $product): ?>
<table class="extended">
    <tr>
        <td>Название</td>
        <td><?php echo $product->product_name?></td>
    </tr>
    <tr>
        <td>Артикул</td>
        <td><?php echo $product->artikul?></td>
    </tr>
    <tr>
        <td>Картинка</td>
        <td><a href="/uploads/products/<?php echo $product->image_big?>" target="_blank"> <img
            src="/uploads/products/<?php echo $product->image_small?>"/></a></td>
    </tr>
    <tr>
        <td>Мужское</td>
        <td><?php echo $product->male ? 'Да' : 'Нет'?></td>
    </tr>
    <tr>
        <td>Женское</td>
        <td><?php echo $product->female ? 'Да' : 'Нет'?></td>
    </tr>
    <tr>
        <td>Дата/Время</td>
        <td><?php echo date('d.m.Y  [H:i]', strtotime($product->created_at))?></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
    </tr>
</table>
<?php
endforeach;?>

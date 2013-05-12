<table cellspacing="0" width="100%">
    <tr>
        <td>
            Маленькая картинка
        </td>
        <td>
            <img width="200px" src="/uploads/products/<?=$product['image_small']?>">
        </td>
    </tr>
    <tr>
        <td>
            Большая Картинка
        </td>
        <td>
            <img width="400px" src="/uploads/products/<?=$product['image_big']?>">
        </td>
    </tr>
    <tr>
        <td>
            Название
        </td>
        <td>
            <strong><?=$product['name']?></strong>
        </td>
    </tr>
    <tr>
        <td>
            Артикул:
        </td>
        <td>
            <?=$product['artikul']?>
        </td>
    </tr>
    <tr>
        <td>
            Коллекция
        </td>
        <td>
            <?=$product['category']?>
        </td>
    </tr>
    <tr>
        <td>
            Группа товара
        </td>
        <td>
            <?=$product['class']?>
        </td>
    </tr>
    <tr >
        <td>
            Бренд
        </td>

        <td>
            <?=$product['brand']?>
        </td>
    <tr>
        <td><br/>
            Вставка
        </td>
        <td>
            <?=$product['rock']?>
        </td>
    </tr>
    <tr>
        <td>
            Новинка (0-99)
        </td>
        <td>
            <?=$product['new']?>
        </td>
    </tr>
    <tr>
        <td>
            Популярность (0-99)
        </td>
        <td>
            <?=$product['fan']?>
        </td>
    </tr>
    <tr>
        <td>
            Описание
        </td>
        <td>
            <?=$product['description']?>
        </td>
    </tr>

</table>
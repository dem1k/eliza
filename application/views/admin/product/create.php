<?php echo  form_open('admin/product/create') ; ?>
<?php echo  form_error("name", "<span class='error'>", "</span><br/>") ?>
<?php echo  form_error("category", "<span class='error'>", "</span><br/>") ?>
<?php echo  form_error("brand", "<span class='error'>", "</span><br/>") ?>`
<?php echo  form_error("artikul", "<span class='error'>", "</span><br/>") ?>
<?php echo  form_error("price", "<span class='error'>", "</span><br/>") ?>
<?php echo  form_error("description", "<span class='error'>", "</span><br/>") ?>
<table cellspacing="0">

    <tr>
        <td>
            Название
        </td>
        <td>
            <input type="text" name="name" value="<?php echo  set_value('name'); ?>"/>
        </td>
    </tr>
    <tr>
        <td>
            Артикул
        </td>
        <td>
            <input type="text" name="artikul" value="<?php echo set_value("artikul")?>"/>
        </td>
    </tr>
    <tr>
        <td>
            Цена
        </td>
        <td>
            <input type="text" name="price" value="<?php echo set_value("price")?>"/>
        </td>
    </tr>
    <tr>
        <td>
            Описание
        </td>
        <td>
            <textarea name="description"><?php echo set_value("description")?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            Категория
        </td>
        <td>
            <select name="category">

                <?php foreach ($categories as $category): ?>
                <option
                    value="<?php echo $category['id']?>"<?php echo set_select('category', $category['id'])?> > <?php echo $category['name']?></option>
                <?php endforeach;?>
                <option value=""<?php echo set_select('category', 0, true)?> >не выбрано</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Бренд
        </td>

        <td>
            <select name="brand">
                <?php foreach ($brands as $brand): ?>
                <option value="<?php echo $brand['id']?>"<?php echo set_select('brand', $brand['id'])?> > <?php echo $brand['name']?></option>
                <?php endforeach;?>
                <option value="0"<?php echo set_select('brand', 0, true)?> >не выбрано</option>


            </select>
        </td>


</table>
<input type="submit" value="Сохранить"/>
<input type="hidden" name="action" value="save"/>

<?php form_close(); ?>
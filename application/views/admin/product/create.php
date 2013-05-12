<script type="text/javascript" src="/assets/js/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="/assets/admin/js/product.js"></script>
<?=form_open_multipart('admin/product/create');?>
<?=form_error("name","<span class='error'>","</span><br/>")?>
<?=form_error("category","<span class='error'>","</span><br/>")?>
<?=form_error("brand","<span class='error'>","</span><br/>")?>
<?=form_error("artikul","<span class='error'>","</span><br/>")?>
<?=form_error("new","<span class='error'>","</span><br/>")?>
<?=form_error("fan","<span class='error'>","</span><br/>")?>
<?=form_error("description","<span class='error'>","</span><br/>")?>
<?= isset($error_upload) ? "<span class='error'>".$error_upload."</span><br/>" : ""?>
<table cellspacing="0">

    <tr>
        <td>
            Название
        </td>
        <td>
            <input type="text" name="name" value="<?= set_value('name'); ?>"/>
        </td>
    </tr>
    <tr>
    <td>
        Артикул
    </td>
    <td>
        <input type="text" name="artikul" value="<?=set_value("artikul")?>"/>
    </td>
</tr>
    <tr>
        <td>
            Коллекция
        </td>
        <td>
            <select name="category">

                <?php foreach ($categories as $category):?>
                <option value="<?=$category['id']?>"<?=set_select('category', $category['id'])?> > <?=$category['name']?></option>
                <?php endforeach;?>
                <option value=""<?=set_select('category', 0,true)?> >не выбрано</option>
            </select>
        </td>
    </tr>

    <tr >
        <td>
            Бренд
        </td>

        <td>
            <select name="brand">
                <?php foreach ($brands as $brand):?>
                <option value="<?=$brand['id']?>"<?=set_select('brand', $brand['id'])?> > <?=$brand['name']?></option>
                <?php endforeach;?>
                <option value="0"<?=set_select('brand', 0,true)?> >не выбрано</option>


            </select>
        </td>
    <tr>
        <td>
            Вставка
        </td>
        <td>
            <select name="rock">
                <?php foreach ($rocks as $rock):?>
                <option value="<?=$rock['id']?>"<?=set_select('rock', $rock['id'])?> > <?=$rock['name']?></option>
                <?php endforeach;?>
                <option value=""<?=set_select('rock', 0,true)?> >не выбрано</option>


            </select>
        </td>
    </tr>
    <tr>
        <td>
            Новинка (0-99)
        </td>
        <td>
            <input type="text" name="new" value="<?=set_value("new",0)?>"/>
        </td>
    </tr>
    <tr>
        <td>
            Популярность (0-99)
        </td>
        <td>
            <input type="text" name="fan" value="<?=set_value("fan",0)?>"/>
        </td>
    </tr>
    <tr>
        <td>
            Описание
        </td>
        <td>
            <textarea  name="description" ><?=set_value("description")?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            Большая картинка
        </td>
        <td>
            <div id="container_big">
                <div id="filelist_big">No runtime found.</div>
                <br />
                <a id="pickfiles_big" href="#">[Выбрать]</a>
                <div id=""></div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            Маленькая картинка
        </td>
        <td>
            <div id="container_small">
                <div id="filelist_small">No runtime found.</div>
                <br />
                <a id="pickfiles_small" href="#">[Выбрать]</a>
                <div id=""></div>
            </div>
        </td>
    </tr>
</table>
<input type="submit" value="Сохранить"/>
<input type="hidden" name="action" value="save"/>

<?php form_close();?>

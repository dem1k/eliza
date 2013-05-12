<script type="text/javascript" src="/assets/js/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="/assets/admin/js/product.js"></script>




<?=form_open_multipart('admin/product/edit/'.$id);?>
<!--form action="/admin/product/create" method="post"  -->
<?=form_error("name","<span class='error'>","</span><br/>")?>
<?=form_error("collection","<span class='error'>","</span><br/>")?>
<? // =form_error("class","<span class='error'>","</span><br/>")?>
<?=form_error("brand","<span class='error'>","</span><br/>")?>
<?=form_error("rock","<span class='error'>","</span><br/>")?>
<?=form_error("artikul","<span class='error'>","</span><br/>")?>
<?=form_error("new","<span class='error'>","</span><br/>")?>
<?=form_error("fan","<span class='error'>","</span><br/>")?>
<?=form_error("description","<span class='error'>","</span><br/>")?>
<?= isset($error_upload) ? "<span class='error'>".$error_upload."</span><br/>" : ""?>
<table cellspacing="0">

    <tr>
        <td>
            Наименование
        </td>
        <td>
            <input type="text" name="name" value="<?= set_value('name',$product['name']); ?>"/>
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
            <select name="collection">
                <?php foreach ($collections as $collection):?>
                <option value="<?=$collection['id']?>"<?= $collection['name']==$product['collection'] ? set_select('collection', $collection['id'],true):set_select('collection', $collection['id'],false)?> > <?=$collection['name']?></option>
                <?php endforeach;?>
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
                <option value="<?=$brand['id']?>"<?=$brand['name']==$product['brand']?set_select('brand', $brand['id'],true):set_select('brand', $brand['id'],false)?> > <?=$brand['name']?></option>
                <?php endforeach;?>
            </select>
        </td>

    <tr>
        <td>
            Вставка
        </td>
        <td>
            <select name="rock">
                <?php foreach ($rocks as $rock):?>
                <option value="<?=$rock['id']?>"<?=$rock['name']==$product['rock']?set_select('rock', $rock['id'],true):set_select('rock', $rock['id'],false)?> > <?=$rock['name']?></option>
                <?php endforeach;?>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            Новинка (0-99)
        </td>
        <td>
            <input type="text" name="new" value="<?=set_value("new",$product['new'])?>"/>
        </td>
    </tr>
    <tr>
        <td>
            Популярность (0-99)
        </td>
        <td>
            <input type="text" name="fan" value="<?=set_value("fan",$product['fan'])?>"/>
        </td>
    </tr>
    <tr>
        <td>
            Описание
        </td>
        <td>
            <textarea  name="description"  rows="5" cols="60"><?=set_value("description",$product['description'])?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            Большая картинка
        </td>
        <td>
            <div id="container_big">
                <img height="200px" src="/uploads/products/<?=$product['image_big']?>"/>
                <input type="hidden" name="image_big" value="<?=$product['image_big']?>" />
                <div id="filelist_big">wait...</div>
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
                <img height="100px"src="/uploads/products/<?=$product['image_small']?>"/>
                <input type="hidden" name="image_small" value="<?=$product['image_small']?>" />
                <div id="filelist_small">wait...</div>
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

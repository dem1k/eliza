<script type="text/javascript" src="/assets/js/plupload/js/plupload.full.js"></script>
<?php echo  (isset($is_new) && $is_new) ? form_open('admin/product/create') : form_open('admin/product/edit/' . $id); ?>
<?php echo  form_error("name", "<span class='error'>", "</span><br/>") ?>
<?php echo  form_error("category", "<span class='error'>", "</span><br/>") ?>
<?php echo  form_error("brand", "<span class='error'>", "</span><br/>") ?>
<?php echo  form_error("artikul", "<span class='error'>", "</span><br/>") ?>
<?php echo  form_error("price", "<span class='error'>", "</span><br/>") ?>
<?php echo  form_error("description", "<span class='error'>", "</span><br/>") ?>
<?php $product = isset($product) ? $product : array(
    'name' => '',
    'artikul' => '',
    'category_id' => '',
    'brand' => '',
    'description' => '',
    'price' => '',
)?>
<table cellspacing="0">

    <tr>
        <td>
            Наименование
        </td>
        <td>
            <input type="text" name="name" value="<?php echo  set_value('name', $product['name']); ?>"/>
        </td>
    </tr>
    <tr>
        <td>
            Артикул
        </td>
        <td>
            <input type="text" name="artikul" value="<?php echo set_value("artikul", $product['artikul'])?>"/>
        </td>
    </tr>
    <tr>
        <td>
            Цена
        </td>
        <td>
            <input type="text" name="price" value="<?php echo set_value("price", $product['price'])?>"/>
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
                    value="<?php echo $category['id']?>"<?php echo  $category['id'] == $product['category_id'] ? set_select('category', $category['id'], true) : set_select('category', $category['id'], false)?> > <?php echo $category['name']?></option>
                <?php endforeach;?>
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
                <option
                    value="<?php echo $brand['id']?>"<?php echo $brand['name'] == $product['brand'] ? set_select('brand', $brand['id'], true) : set_select('brand', $brand['id'], false)?> > <?php echo $brand['name']?></option>
                <?php endforeach;?>
            </select>
        </td>


    <tr>
        <td>
            Описание
        </td>
        <td>
            <textarea name="description" rows="5"
                      cols="60"><?php echo set_value("description", $product['description'])?></textarea>
        </td>
    </tr>
    <?php if (!isset($is_new)): ?>
    <tr>
        <td>
            Фото
        </td>
        <td>
            <div id="container">
                <?php foreach ($images as $img): ?>
                <div class="img <?php echo $img->is_first ? 'active' : ''?>">
                    <a href="/admin/product/setmainimg/<?php echo $id ?>/<?php echo $img->id ?>">Главная</a>
                    <span><img width="100px" src="/uploads/products/<?php echo $img->image ?>" alt=""></span>
                    <a data-action="rm" href="/admin/product/removeimg/<?php echo $img->id ?>">Удалить</a>
                </div>
                <?php endforeach;?>
            </div>
        </td>
    </tr>
    <?php endif;?>


</table>
<input type="submit" value="Сохранить"/>
<input type="hidden" name="action" value="save"/>

<?php form_close(); ?>
<?php if (!isset($is_new)): ?>
<a id="pickfiles" href="#">[Добавить фото]</a>


<script type="text/javascript">
    // Custom example logic
    $(function () {
        var uploader = new plupload.Uploader({
            runtimes:'html5',
            browse_button:'pickfiles',
            container:'container',
            max_file_size:'10mb',
            url:'/admin/product/upload/<?php echo $product['id']?>',
            unique_names:true,
            filters:[
                {title:"Image files", extensions:"jpg,gif,png"}
            ]
//        ,
//        resize:{width:320, height:240, quality:90}
        });

        uploader.bind('Init', function (up, params) {
            $('#filelist').html("<div>Current runtime: " + params.runtime + "</div>");
        });

        /* $('#uploadfiles').click(function (e) {
            uploader.start();
            e.preventDefault();
        });*/

        uploader.init();

        uploader.bind('FilesAdded', function (up, files) {
            $.each(files, function (i, file) {
                $('#filelist').append(
                    '<div id="' + file.id + '">' +
                        file.name + ' (' + plupload.formatSize(file.size) + ') <b></b>' +
                        '</div>');
            });
            uploader.start();
            up.refresh();
        });

        uploader.bind('UploadProgress', function (up, file) {
            $('#' + file.id + " b").html(file.percent + "%");
        });

        uploader.bind('Error', function (up, err) {
            $('#filelist').append("<div>Error: " + err.code +
                ", Message: " + err.message +
                (err.file ? ", File: " + err.file.name : "") +
                "</div>"
            );

            up.refresh();
        });

        uploader.bind('FileUploaded', function (up, file, res) {
            $('#' + file.id + " b").html("100%");
            res = JSON.parse(res.response);
            $('#container div.img').last().after('<div class="img"><a href="/admin/product/setmainimg/<?php echo $id ?>/' + res.id + '">Главная</a>' +
                '<span ><img width="100px" src="/uploads/products/<?php echo $id ?>/' + file.target_name + '"></span>' +
                '<a data-action="rm" href="/admin/product/removeimg/' + res.id + '">Удалить</a></div>');
        });

        $('#container').delegate('div.img a', 'click', function (e) {
            e.preventDefault();
            $btn = $(this);
            $.ajax({
                url:$btn.attr('href'),
                success:function () {
                    if ($btn.data('action') == 'rm') {
                        $btn.parent('div.img').remove();
                    }
                    else {
                        $('#container div.img').removeClass('active');

                        $btn.parent('div.img').addClass('active');
                    }
                }
            });
        })
    });
</script>
<?php endif; ?>
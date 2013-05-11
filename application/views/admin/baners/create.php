<script type="text/javascript" src="/assets/js/plupload/js/plupload.full.js"></script>
<script type="text/javascript">
    $(function () {
        var uploader = new plupload.Uploader({
            runtimes:'html5,flash',
            browse_button:'pickfiles_big',
            container:'container_big',
            max_file_size:'3mb',
//            chunk_size:'500kb',
            unique_names:true,
            url:'/admin/baners/upload',
            flash_swf_url:'/plupload/js/plupload.flash.swf',
            filters:[
                {
                    title:"Image files",
                    extensions:"jpg,gif,png,tif"
                },

            ],
        });
        uploader.bind('Init', function (up, params) {
            $('#filelist_big').html("<div>Current runtime: " + params.runtime + "</div>");
        });
        uploader.init();
        uploader.bind('FilesAdded', function (up, files) {
            $.each(files, function (i, file) {
                $('#filelist_big').append(
                    '<div id="' + file.id + '">' +
                        file.name + ' (' + plupload.formatSize(file.size) + ') <b></b>' +
                        '</div>');
            });
            uploader.start();

            up.refresh(); // Reposition Flash/Silverlight
        });
        uploader.bind('UploadProgress', function (up, file) {
            $('#' + file.id + " b").html(file.percent + "%");
        });
        uploader.bind('Error', function (up, err) {
            $('#filelist_big').append("<div>Error: " + err.code +
                ", Message: " + err.message +
                (err.file ? ", File: " + err.file.name : "") +
                "</div>"
            );

            up.refresh(); // Reposition Flash/Silverlight
        });
        uploader.bind('FileUploaded', function (up, file) {
            $('#' + file.id + " b").html("100%");
            $('#container_big').html('<a href="/uploads/images/' + file.target_name + '" target="_blank"><img height="200px" src="/uploads/images/' + file.target_name + '"></a>\n\
\n\
<input type="hidden" name="image" value="' + file.target_name + '" />');
        });
    });
</script>
<?= form_open_multipart('admin/baners/create')
; ?>
<?= form_error("title", "<span class='error'>", "</span><br/>") ?>
<?= form_error("url", "<span class='error'>", "</span><br/>") ?>
<?= form_error("image", "<span class='error'>", "</span><br/>") ?>
<?= form_error("baner_place_id", "<span class='error'>", "</span><br/>") ?>
<table cellspacing="0">

    <tr>
        <td>
            Заголовок
        </td>
        <td>
            <input type="text" name="title" value="<?= set_value('title'); ?>"/>
        </td>
    </tr>
<!--    <tr>-->
<!--        <td>-->
<!--            Тип банера-->
<!--        </td>-->
<!--        <td>-->
<!--            <select name="baner_type_id">-->
<!---->
<!--                --><?php //foreach ($baner_types as $baner_type): ?>
<!--                <option-->
<!--                    value="--><?//=$baner_type->id?><!--"--><?//=set_select('baner_type_id', $baner_type->id)?><!-- > --><?//=$baner_type->name?><!--</option>-->
<!--                --><?php //endforeach;?>
<!--                <option value=""--><?//=set_select('baner_type_id', 0, true)?><!-- >не выбрано</option>-->
<!--            </select>-->
<!--        </td>-->
    </tr>
    <tr>
        <td>
            Место банера
        </td>
        <td>
            <select name="baner_place_id">

                <?php foreach ($baner_places as $baner_place): ?>
                <option
                    value="<?=$baner_place->id?>"<?=set_select('baner_place_id', $baner_place->id)?> > <?=$baner_place->name?></option>
                <?php endforeach;?>
                <option value=""<?=set_select('baner_place_id', 0, true)?> >не выбрано</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>
            URL
        </td>
        <td>
            <input type="text" name="url" value="<?= set_value('url'); ?>"/>
        </td>
    </tr>
    <tr>
        <td></td></tr>
    <tr>
        <td>
            Картинка
        </td>
        <td>
            <div id="container_big">
                <div id="filelist_big">wait...</div>
                <br/>
                <a id="pickfiles_big" href="#">[Выбрать]</a>

                <div id=""></div>
            </div>

        </td>
    </tr>
</table>
<input type="submit" value="Сохранить"/>
<input type="hidden" name="action" value="save"/>

<?php form_close(); ?>

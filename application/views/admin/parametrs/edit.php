<?=form_open('admin/parametrs/edit/'.$parametr.'/'.$id);?>
<h1> <?php

        switch ($parametr) {
        case 'categories':echo "Изменить категорию";
            break;
        case 'classes':echo "Изменить группу";
            break;
        case 'brand':echo "Изменить бренд";
            break;
        case 'colors':echo "Изменить цвет";
            break;
        case 'rocks':echo "Изменить вставку";
            break;
        case 'category_art':echo "Изменить категорию статьи";
            break;

        default:
            break;
    } ?>


</h1>
Введите имя <input type="text" name="name" value="<?= set_value('name',$name)?>"/>
<br/>
<?=form_hidden("action","save")?>
<input type="submit" value="Сохранить"/>
<?=form_close()?>
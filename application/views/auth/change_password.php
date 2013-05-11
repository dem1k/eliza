<div class="wrapper registration">
    <div class="show_ring static ">
        <h1>Изменить пароль</h1>
        <div id="infoMessage"><?php echo $message;?></div>

        <?php echo form_open("auth/change_password");?>

        <div class="element">
            <label for="<?php echo $old_password?>">Старый пароль:</label>
            <?php echo form_input($old_password);?>
        </div>
        <div class="element">
            <label for="<?php echo $new_password?>">Новый пароль:</label>
            <?php echo form_input($new_password);?>
        </div>
        <div class="element">
            <label for="<?php echo $new_password_confirm?>"> Повторите новый пароль:</label>
            <?php echo form_input($new_password_confirm);?>
        </div>

        <?php echo form_input($user_id);?>

            <?php echo form_submit('submit', 'Готово','class="button_obruchka"','class = "btn_reg btn_ok float_left"');?>


        <?php echo form_close();?>
    </div>
</div>
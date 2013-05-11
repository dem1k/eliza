<div class="wrapper registration">
    <div class="show_ring static ">
        <div class='mainInfo'>

            <h1>Регистрация пользователя</h1>

            <p>Пожалуйста заполните пользавательскую информацию ниже.</p>

            <div id="infoMessage"><?php echo $message;?></div>
            <div class="element">
                <?php echo form_open("auth/register");?>
                <label for="<?php echo $last_name?>">Имя:</label><br/>
                <?php echo form_input($first_name);?>
            </div>
            <div class="element">
                <label for="<?php echo $last_name?>"> Фамилия:</label>
                <?php echo form_input($last_name);?>

            </div>
            <div class="element">
                    <label for="<?php echo $last_name?>">Город:</label><br/>
                    <?php echo form_input($company);?>
            </div>
            <div class="element">
                    <label for="<?php echo $last_name?>">Email:</label><br/>
                    <?php echo form_input($email);?>
            </div>
            <div class="element">
                    <label for="<?php echo $last_name?>">Телефон:</label><br/>
                    <?php echo form_input($phone1);?>
                    <!--                ---><?php //echo form_input($phone2);?><!-----><?php //echo form_input($phone3);
                    ?>
            </div>
            <div class="element">
                    <label for="<?php echo $last_name?>">Password:</label><br/>
                    <?php echo form_input($password);?>
            </div>
            <div class="element">
                    <label for="<?php echo $last_name?>">Confirm Password:</label><br/>
                    <?php echo form_input($password_confirm);?>
            </div>
            <div class="buttons">

                <?php echo form_submit('submit', 'Зарегистрировать','class = "btn_reg btn_ok float_left"');?>

            </div>
            <?php echo form_close();?>

        </div>
    </div>
</div>
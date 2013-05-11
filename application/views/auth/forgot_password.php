<div class="wrapper registration">
    <div class="top_bg_article">
        <div class="btm_bg_article">
            <div class="show_ring static basket">
                <h1>Forgot Password</h1>

                <p>Пожалуйста введите ваш <?php echo $identity_human;?> , и мы сможем отправить вам письмо для сброса пароля.</p>

                <div id="infoMessage"><?php echo $message;?></div>

                <?php echo form_open("auth/forgot_password");?>
                <div class="element">
                    <label for="<?php echo $identity_human;?>">Email:</label>
                    <?php echo form_input($identity,'','class = "input_obruchka"');?>
                </div>

                <p><?php echo form_submit('submit', 'Ок','class ="button_obruchka"');?></p>

                <?php echo form_close();?></div>
        </div>
    </div>
</div>
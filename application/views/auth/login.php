<article class="col2">
    <h3 class="pad_top1">Login</h3>

    <div class="wrapper pad_bot3 registration">
        <div class="show_ring static basket ">
            <?php echo form_open("auth/login", ' id="ContactForm"');?>
            <div class="element">
                <div class="wrapper"><span> Email:</span>

                    <?php echo form_input($email, "Ваш Email", 'class="input"');?>
                    <?=form_error('login', '<div class="error">', '</div>')?>
                </div>
            </div>
            <div class="clear" style="margin-bottom:20px"></div>
            <div class="element">
                <div class="wrapper"><span> Пароль:</span>
                    <input type="password" name="password" id="password" class="input" value="Пароль"/>
                    <?=form_error('password', '<div class="error">', '</div>')?>
                </div>
            </div>
            <div class="wrapper">
                <input type="checkbox" value="1" name="remember_me">
                <span class="">Запомнить меня</span>
            </div>
            <div class="wrapper">
                <div class="button1">
                    <input type="submit" name="submit_login" value="Вход"/>
                </div>
                <div class="wrapper">
                    <?php echo form_close();?>
                    <div class="wrapper">
                        <div class="clear"></div>
                        <div class="element">
                            <a href="/auth/register" class="blue_link">Регистрация / </a>
                            <a href="/auth/forgot_password/" class="blue_link">Забыли пароль?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</article>
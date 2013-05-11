<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link type="text/css" href="/assets/admin/themes/smoothness/jquery-ui-1.7.2.custom.css" rel="Stylesheet"/>
    <link type="text/css" href="/assets/admin/css/admin.css" rel="Stylesheet"/>
    <script type="text/javascript" src="/assets/js/jquery.js"></script>
    <script src="/assets/js/ui/ui/jquery.ui.core.js" type="text/javascript"></script>
    <script src="/assets/js/ui/ui/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="/assets/js/ui/ui/jquery.ui.dialog.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/admin/js/admin.js"></script>
</head>
<body>
<?php echo form_open("/admin/auth/login");?>


    <label for="email">Логин Email:</label>

<div class="field">
    <?php echo form_input($email);?>
    <?=form_error('login', '<div class="error">', '</div>')?>
</div>
<div class="clear"></div>

<label for="password">Пароль</label>

<div class="field">
    <input type="password" name="password" id="password" value=""/>
    <?=form_error('password', '<div class="error">', '</div>')?>
</div>
<div class="clear" style="margin-bottom:10px"></div>

<div style="float:left;"><input type="checkbox" value="1" name="remember_me"><span class="">Запомнить меня</span></div>
<input type="submit" style="float:right" name="submit_login" value="Вход"/>

<div class="clear"></div>

<?php echo form_close();?>


</body>
</html>

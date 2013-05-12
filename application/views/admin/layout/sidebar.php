<?php
$tab = $res ? $res : "category";

//var_dump($res);exit;
?>

<div class="column-left">

    <ul class="sidebar">
        <li class="<?= ($tab == "category") ? "active" : "" ?>"><a href="/admin/category/">Коллекции</a></li>
        <li class="<?= ($tab == "orders") ? "active" : "" ?>"><a href="/admin/orders/">Заказы</a></li>
        <!--li class="<?=($tab == "startpage") ? "active " : "" ?>"><a href="/admin/startpage">Главная</a></li-->
        <li class="<?= ($tab == "product") ? "active" : "" ?>"><a href="/admin/product/productlist/">Товары</a></li>
        <li class="<?= ($tab == "parametrs") ? "active" : "" ?>"><a href="/admin/parametrs/">Параметры товара</a></li>
        <li class="<?= ($tab == "article") ? "active" : "" ?>"><a href="/admin/article/">Статьи</a></li>
        <li class="<?= ($tab == "map") ? "active" : "" ?>"><a href="/admin/map/">Карта</a></li>
        <li class="<?= ($tab == "baners") ? "active" : "" ?>"><a href="/admin/baners/">Банеры и кнопки</a></li>
        <li class="<?= ($tab == "seo") ? "active" : "" ?>"><a href="/admin/seo/">Настройки сайта</a></li>
        <li class="<?= ($tab == "emails") ? "active" : "" ?>"><a href="/admin/emails/">Рассылка</a></li>
        <li class="<?= ($tab == "auth") ? "active" : "" ?>"><a href="/admin/auth/users_list/">Пользователи</a></li>
        <li class="<?= ($tab == "server") ? "active" : "" ?>"><a href="/admin/server/">Server PHP Info</a></li>
        <li class="last"><a href="/auth/logout/">Выход</a></li>
    </ul>

</div>




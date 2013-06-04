<?php
$tab = $res ? $res : "category";

//var_dump($res);exit;
?>

<div class="column-left">

    <ul class="sidebar">
        <li class="<?= ($tab == "category") ? "active" : "" ?>"><a href="/admin/category/">Каталог</a></li>
        <li class="<?= ($tab == "product") ? "active" : "" ?>"><a href="/admin/product/productlist/">Товары</a></li>
<!--        <li class="--><?//= ($tab == "parametrs") ? "active" : "" ?><!--"><a href="/admin/parametrs/">Параметры товара</a></li>-->
        <li class="<?= ($tab == "article") ? "active" : "" ?>"><a href="/admin/article/">Статьи</a></li>
        <li class="<?= ($tab == "baners") ? "active" : "" ?>"><a href="/admin/baners/">Банеры и кнопки</a></li>
        <li class="<?= ($tab == "seo") ? "active" : "" ?>"><a href="/admin/seo/">Настройки сайта</a></li>
        <li class="<?= ($tab == "orders") ? "active" : "" ?>"><a href="/admin/orders/">Заказы</a></li>
        <li class="<?= ($tab == "emails") ? "active" : "" ?>"><a href="/admin/emails/">Рассылка</a></li>
        <li class="<?= ($tab == "server") ? "active" : "" ?>"><a href="/admin/server/">Server PHP Info</a></li>
        <li class="last"><a href="/auth/logout/">Выход</a></li>
    </ul>

</div>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Eliza Plus </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/images/tmp/ucoz/shop.css" type="text/css" media="all">
    <script type="text/javascript" src="/assets/js/jquery-1.10.2.js" ></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5.js"></script>
    <style type="text/css">.main, .tabs ul.nav a, .content, .button1, .box1, .top { behavior:url("../js/PIE.htc")}</style>
    <![endif]-->
    <style type="text/css">
        body {
            /*background:#ddd url(/assets/images/tmp/ucoz/bg.png);*/
            font-family:Arial,Tahoma,"Century gothic",sans-serif;
            color:#444;
            font-size:13px;}

        #content {float:right;width:760px;}

        #casing {min-height:500px;padding:20px 0;}
        #casing .wrapper {background:url(/assets/images/tmp/ucoz/hr-ver.png) 220px 0 repeat-y;}
        #casing.forum-casing .wrapper {background:none;}
        #sidebar {float:left;width:200px;}
        .sidebox{padding:0 0 20px 0;}
        .sidebox .inner {padding:10px 0;}
        .sidetitle {color:#333;font-size:18px;padding:0 0 10px 0;font-family:'Lobster';background:url(/assets/images/tmp/ucoz/hr-hor.png) 0 bottom repeat-x;}
        .sidebox ul {list-style-type:none;margin:0;padding:0;z-index:10;}
        .sidebox ul li,.sidebox .catsTd {padding:3px 5px;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;}
        .sidebox .odd {background:#ccc url(/assets/images/tmp/ucoz/li-bg.png);}

        .shop-item {float:left;width:190px;padding:10px 20px 10px 0;}
        .no-pad .shop-item,#content .list-item:nth-child(4n) .shop-item {padding-right:0;}
        .item-box {
            background:#e7e7e7;
            padding:25px 15px;
            border:1px solid #fff;
            border-radius:5px;
            -moz-border-radius:5px;
            -webkit-border-radius:5px;
            -webkit-box-shadow:0 1px 3px #999;
            -moz-box-shadow:0 1px 3px #999;
            box-shadow:0 1px 3px #999;
        }
        .item-thumb {position:relative;overflow:hidden;}
        .item-lnk {display:block;width:160px;height:200px;position:relative;cursor:pointer;color:#444;text-decoration:none;}
        .item-lnk:hover {color:#444;text-decoration:none;}
        .item-lnk img {width:160px;height:200px;position:absolute;top:0;left:0;}
        .item-lnk .img-lupe {display:block;position:absolute;margin-left:-25px;margin-top:-25px;height:50px;width:50px;left:50%;top:50%;background-image:url(/img/lupe.png);display:none;}
        .item-lnk .img-hov {display:block;width:160px;height:200px;position:absolute;top:0;left:0;display:none;background:#000;}
        .item-lnk .img-mask {display:block;width:160px;height:200px;position:absolute;top:0;left:0;background:url(/assets/images/tmp/ucoz/mask.png);_background:none;}
        .item-mdr {display:block;position:absolute;top:5px;right:0;}
        .item-ttl {position:absolute;display:block;left:0;bottom:10px;font-size:12px;font-weight:bold;max-width:90%;padding:5px 5px 5px 2px;background:#e7e7e7;border:1px solid #fff;border-left:none;-webkit-border-top-right-radius:5px;-webkit-border-bottom-right-radius:5px;-moz-border-radius-topright:5px;-moz-border-radius-bottomright:5px;border-top-right-radius:5px;border-bottom-right-radius:5px;}
        .item-meta {padding:5px 2px 0 2px;}
        .item-prc {float:left;height:24px;line-height:24px;font-weight:bold;}
        .item-btn {float:right;}
        .item-btn .basket {float:left;}
        .item-btn .more-lnk {
            float:left;
            display:block;
            width:26px;
            height:24px;
            margin:0 3px 0 0;
            background:url(/assets/images/tmp/ucoz/btns.png);cursor:pointer;}
        .item-btn .more-lnk:hover {background-position:-30px 0;}
        .goods-list .basket {width:30px;height:24px;background:url(/assets/images/tmp/ucoz/btns.png) 0 -24px;cursor:pointer;}
        .goods-list .basket-hover {background-position:-30px -24px;}
        .goods-list .err {background-position:0 -48px!important;}
        .goods-list .wait {background:url(/assets/images/tmp/ucoz/ajax.gif) center center no-repeat;}
    </style>
</head>
<body id="page1">
<div class="main">
    <!--header -->
    <header>
        <div class="wrapper">
            <h1><a href="<?php echo base_url()?>" id="logo">Eliza Plus</a></h1>
            <span id="slogan">Мужская, женская и детская одежда оптом</span>
            <div id="top_nav">
                <ul>
                    <li>тел. +380501231231</li>
                    <li>тел. +380501231231</li>
                    <li>icq  1231231</li>
                </ul>

            </div>
        </div>
        <nav>
                <ul class="nav">
                    <li><a href="<?php echo base_url()?>" class="first"  id="menu_active"><span><span>Главная</span></span></a></li>
                    <li><a href="<?php echo base_url('howto_order')?>"><span><span>Как заказать?</span></span></a></li>
                    <li><a href="<?php echo base_url('payments')?>"><span><span>Оплата и доставка</span></span></a></li>
                    <li><a href="<?php echo base_url('about_us')?>"><span><span>О нас</span></span></a></li>
                    <li><a href="<?php echo base_url('contacts')?>"><span><span>Контакты</span></span></a></li>
                    <li><a href="<?php echo base_url('articles')?>"><span><span>Статьи</span></span></a></li>
                    <li class="end"><a href="<?php echo base_url('reviews')?>"><span><span>Отзывы</span></span></a></li>
                </ul>
        </nav>
    </header>
    <!-- / header -->
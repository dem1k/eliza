<article class="col2">
    <h3 class="pad_top1"><?php echo $article->name?></h3>

    <div class="wrapper pad_bot3">
        <div class="top_bg_article">
            <div class="btm_bg_article">
                <div class="show_ring static">
                    <div class="content_article">
<!--                        <div class="breadcrumbs">-->
<!--                            <ul>-->
<!--                                <li><a href="/">Главная</a><span></span></li>-->
<!--                                <li><a href="/article/">Статьи</a><span></span></li>-->
<!--                                <li>--><?//=$article->name?><!--</li>-->
<!--                            </ul>-->
<!--                        </div>-->
                        <div class="article">
                            <img src="/uploads/articles/<?=$article->image?>" alt=""/>

                            <h1><?=$article->name?></h1>
                            <?=$article->description?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="wrap_list_articles">-->
<!--            <h2>Читайте по этой теме</h2>-->
<!--            <ul class="list_articles">-->
<!---->
<!--                --><?php ////var_dump($artlist);die;
//                foreach ($artlist as $art):?>
<!--                    <li>-->
<!--                        <a href="#"><img src="/uploads/articles/--><?//=$art['image']?><!--" alt=""/></a>-->
<!---->
<!--                        <div class="short_descript">-->
<!--                            <h3><a href="/article/--><?//=$art['slug']?><!--">--><?//=$art['name']?><!--</a></h3>-->
<!---->
<!--                            <p>--><?//=$art['cut']?><!--</p>-->
<!--                            <a class="more" href="/article/--><?//=$art['slug']?><!--">&nbsp;Далее...</a>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    --><?php //endforeach;?>
<!--            </ul>-->
<!--        </div>-->
    </div>
</article>
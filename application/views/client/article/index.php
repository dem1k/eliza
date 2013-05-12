<div class="wrapper">
    <div class="top_bg_article">
        <div class="btm_bg_article">
            <div class="show_ring static">
                <div class="content_article">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="/">Главная</a><span></span></li>
                            <li><a href="/article/">Статьи</a><span></span></li>
                        </ul>
                    </div>
                          <?php if(!$articles):?> Нет статей в етой категории<?php else:?>
                    <div class="wrap_list_articles">
                        <div class="head_all_articles">
                          <h1><?=$articles[0]->category_art?></h1>
                            <!--ul class="nav_pg_art">
                                <li class="current"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li>...</li>
                                <li><a href="#">11</a></li>
                                <li><a  class="more" href="#">Показать все</a></li>
                            </ul-->
                        </div>
                        <ul class="list_articles">
                            <?php foreach($articles as $article):?>
                            <li>
                                <a href="/article/<?=$article->slug?>"><img src="/uploads/articles/<?=$article->image?>" alt="" /></a>
                                <div class="short_descript">
                                    <h3><a href="/article/<?=$article->slug?>"><?=$article->name?></a></h3>
                                    <p><?=$article->cut?></p>
                                    <a class="more" href="/article/<?=$article->slug?>">&nbsp;Далее...</a>
                                </div>
                            </li>
                            <?php endforeach?>
                    </div><?php endif;?>
                </div>
            </div>
        </div>
    </div>

</div>
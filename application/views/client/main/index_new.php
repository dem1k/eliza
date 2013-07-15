
<h2><!--<s4623>-->Популярные<!--</s>--></h2>
<hr class="big-hr">
<div class="goods-list with-clear">

    <div class="list-item" id="top_view-item-48">
         <?php foreach ($products as $prod): ?>
        <div class="shop-item">
            <div class="item-box">
                <div class="item-thumb">
                    <a  href="/product/<?php echo $prod->id?>"  onclick="window.show_more_details(this);return false" class="item-lnk">
                        <img src="/uploads/products/<?php echo $prod->image_big?>" alt="Юбка" class="gphoto"
                             id="top_view-gphoto-48"
                             style="width: 160px; left: 0px; height: 200px; top: 0px; overflow: hidden; ">
                        <span class="img-hov" style="display: inline; opacity: 0; "></span>
                        <span class="img-lupe" style="display: inline; opacity: 0; "></span>
                        <span class="img-mask"></span>
                        <span class="item-ttl"><?php echo $prod->name?></span>
                    </a>
                </div>
                <div class="item-meta">
                    <div class="item-prc">
                        <span class="top_view">
                            <?php echo $prod->price?> грн.
                        </span>
                    </div>
                    <div class="item-btn">
                        <a href="/product/<?php echo $prod->id?>" onclick="window.show_more_details(this);return false" class="more-lnk"
                                             title="Подробнее"></a>

                        <div  class="basket add"  title="В корзину"></div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
        </div>
            <?php endforeach?>
    </div>
</div>

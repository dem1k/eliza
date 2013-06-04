<article class="col2">

<!--    --><?php //var_dump($products_fav);?>
    <h2>Популярные модели</h2>

    <div>
        <ul class="catalog">


            <?php foreach ($products as $prod): ?>

            <li class="cat_product">
                <a href="#">
                    <img height="188px" src="/uploads/products/<?php echo $prod->image_big?>" alt="">
                </a>

                <div class="hover_model" key="<?php echo $prod->id?>">
                    <div class="top_part">
                        <strong><?php echo $prod->name?></strong>
                        <br>
                        <span>Цена <span id="m_weight1"><?php echo $prod->price?></span> грн.</span><br>
                    </div>
                    <div class="btm_part">
                        <strong>Описание</strong>
                        <br>
                    </div>
                    <a class="show_more_details" href="/product/<?php echo $prod->id?>"
                       onclick="window.show_more_details(this);return false">Узнать больше</a>
                </div>
            </li>
            <?php endforeach;?>


        </ul>
    </div>

</article>

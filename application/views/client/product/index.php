<article class="col2">
    <h3 class="pad_top1"><?php echo $prod['name']?></h3>

    <div class="wrapper pad_bot3">

        <div class="models">
            <div class="show_ring">
                <form name="product" action="/basket/add/" method="get">
                    <fieldset>
                        <div class="left_part">
                            <h2 id="name"><?=$prod['name']?></h2>
                            <input type="hidden" name='id' value="<?=$prod['id']?>">
                            <input type="hidden" name='name' value="<?=$prod['name']?>">
                            <input type="hidden" name='artikul' value="<?=$prod['artikul']?>">
                            <table>
                                <tr>
                                    <th scope="col" id="artikul"> <?=$prod['artikul']?></th>
                                </tr>
                                <tr class="tables_link">
                                </tr>
                            </table>
                            <div>
                                <br/>
                                <br/>
                                <?php if (!empty($prod['description'])): ?>
                                <?php echo $prod['description'] ?>
                                <?php else: ?>
                                <div class="b-product__info-view">
                                    <div class="b-product__title as_h2">Информация для заказа</div>
                                    <ul class="b-product__info-list">
                                        <li class="b-product__info-list-item">
                                            <b>Цена:</b>
                                            13 грн.
                                        </li>
                                        <li class="b-product__info-list-item">
                                            <b>Минимальный объем заказа:</b>
                                            12 шт.
                                        </li>
                                    </ul>
                                </div>
                                <?php endif;?>
                            </div>
                            <div class="buttons">
                                <input onclick="window.basket($('form[name=product]'));return false;"
                                       class="in_basket btn_ok" type="submit" value="в корзину"/>
                                <!--                <input class="in_basket btn_ok left" type="submit" value="в корзину"/>-->
                            </div>
                        </div>
                        <div class="right_part">
                            <a href="#" class="btn_close" onclick="$('div.show_ring').hide()"
                               title="Закрыть">Закрыть</a>

                            <div class="analog">
                                <h3>Похожие товары</h3>
                                <ul>
                                    <?php foreach ($images as $img): ?>
                                    <li>
                                        <div class="img <?php echo $img->is_first ? 'active' : ''?>">

                                            <span><img width="100px" src="/uploads/products/<?php echo $img->image ?>"
                                                       alt=""></span>

                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</article>






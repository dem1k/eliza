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
                                <tr>
                                    <td><strong>вставка:</strong><span class="rock"><?=$prod['rock']?></span></td>
                                    <td><strong>вставка:</strong><span class="rock"><?=$prod['rock']?></span></td>
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
                                <p align="justify">
                                    13 грн.
                                </p>

                                <p align="justify">
                                    Минимальный заказ — 12 шт.
                                </p>

                                <p align="justify">
                                    Минимальная сумма заказа — 500 грн.
                                </p>
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

                            <div class="picture">
                                <img src="/uploads/products/<?=$prod['image_big']?>" alt=""/>

                                <div class="names_ring">
                                    <strong><?=$prod['artikul']?></strong>
                                </div>
                            </div>
                            <div class="analog">
                                <h3>Похожие товары</h3>
                                <ul><?if (isset($related_rings)): ?>
                                    <?php foreach ($related_rings as $r_ring): ?>
                                        <li>
                                            <a href="/product/<?=$r_ring->id;?>"
                                               onclick="window.show_more_details(this);return false">
                                                <img height="96" src="/uploads/products/<?=$r_ring->image_small;?>"
                                                     alt="<?=$r_ring->name?>"/>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    <? endif;?>
                                </ul>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</article>






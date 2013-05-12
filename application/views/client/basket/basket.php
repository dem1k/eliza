<div class="wrapper registration">
    <div class="top_bg_article">
        <div class="btm_bg_article">
            <div class="show_ring static basket">
                <a href="/category/" class="btn_close" title="Закрыть">Закрыть</a>

                <form class="basket_form" action="/basket/checkout/" >
                    <fieldset>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Главная</a><span></span></li>
                                <li>Мне понравилось</li>
                            </ul>
                        </div>
                        <?php if (!$this->ion_auth->logged_in()): ?>
                        <p><a href="/auth/login/" class="blue_link">
                                Войдите в систему</a> или <a href="/auth/register/" class="blue_link">зарегистрируйтесь</a>, это ускорит оформление заказа.
                        </p>
                        <?php endif;?>
                        <?php if (isset($products) && !empty($products)): ?>
                        <div class="table_order">
                            <table class="order">
                                <tr>
                                    <th>Фотография</th>
                                    <th>Характеристика</th>
                                    <th>Артикул</th>
                                    <th>Тип</th>
                                    <th>&nbsp;</th>
                                </tr>

                                <?php foreach ($products as $product): ?>
                                <tr id="<?php echo $product['rowid']?>">
                                    <td>
                                        <div class="foto_ring_order">
                                            <a href="/product/<?php echo $product['ring']['id']?>" >
                                                <img src="/uploads/products/<?php echo $product['ring']['image_small']?>"
                                                 alt=""/>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="characteristic">
                                        <p class="upper"><?php echo $product['ring']['name'] ? $product['ring']['name'] : "Обручальное кольцо"?></p>

                                        <p><strong>вес:</strong> <?php echo $product['ring']['m_weight']?>
                                            / <?php echo $product['ring']['f_weight']?> г</p>

                                        <p><strong>вставка:</strong> <?php echo $product['ring']['rock']?></p>
                                        <!--                                        <p><strong>вес вставки:</strong> 0,3 г</p>-->
                                    </td>
                                    <td><?php echo $product['ring']['artikul']?></td>
                                    <td class="checkbox_col">
                                        <div class="check_element">
                                            <label for="ring1_male">мужское</label>
                                            <input type="checkbox" checked="checked" class="styled" name="ring_<?php echo $product['ring']['id']?>_male"
                                                   id="ring1_male"/>
                                        </div>
                                        <div class="check_element">
                                            <label for="ring1_female">женское</label>
                                            <input type="checkbox" checked="checked" class="styled" name="ring_<?php echo $product['ring']['id']?>_female"
                                                   id="ring1_female"/>
                                        </div>
                                    </td>
                                    <td class="del_link"><a href="/basket/remove/?rowid=<?php echo $product['rowid']?>" onclick="window.basket_remove(this);return false;" class="del_ring">Удалить из корзины</a></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="buttons">
                            <input type="submit" class="btn_reg btn_ok float_left" value="Оформить заказ"/>
                        </div>
                        <?php else: ?>
                        <div> <h1 >Нет добавленных продуктов</h1></div>
                        <?php endif;?>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
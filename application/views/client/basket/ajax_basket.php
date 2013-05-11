<div class="wrapper registration">
    <div class="top_bg_article">
        <div class="btm_bg_article">
            <div class="show_ring static basket">
                <a href="#" class="btn_close" title="Закрыть">Закрыть</a>

                <form action="#">
                    <fieldset>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="#">Главная</a><span></span></li>
                                <li>Мне понравилось</li>
                            </ul>
                        </div>
                        <p>Если Вы зарегистрированы, <a href="#" class="blue_link">войдите в систему</a>, это ускорит
                            оформление заказа.</p>

                        <div class="table_order">
                            <table class="order">
                                <tr>
                                    <th>Фотография</th>
                                    <th>Характеристика</th>
                                    <th>Артикул</th>
                                    <th>Тип</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php if (!empty($products)): ?>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td>
                                            <div class="foto_ring_order">
                                                <img src="/uploads/products/<?php echo $product['image_small']?>"
                                                     alt=""/>
                                            </div>
                                        </td>
                                        <td class="characteristic">
                                            <p class="upper"><?php echo $product['name'] ? $product['name'] : "Обручальное кольцо из {$product['metal']} c {$product['rock']}"?></p>

                                            <p><strong>вес:</strong> <?php echo $product['m_weight']?>
                                                / <?php echo $product['f_weight']?> г</p>

                                            <p><strong>вставка:</strong> <?php echo $product['rock']?></p>
                                            <!--                                        <p><strong>вес вставки:</strong> 0,3 г</p>-->
                                        </td>
                                        <td><?php echo $product['m_art']?> <br/><?php echo $product['f_art']?></td>
                                        <td class="checkbox_col">
                                            <div class="check_element">
                                                <label for="ring1_male">мужское</label>
                                                <input type="checkbox" checked="checked" class="styled" name="ring_sex"
                                                       id="ring1_male"/>
                                            </div>
                                            <div class="check_element">
                                                <label for="ring1_female">женское</label>
                                                <input type="checkbox" class="styled" name="ring_sex"
                                                       id="ring1_female"/>
                                            </div>
                                        </td>
                                        <td class="del_link"><a href="#" class="del_ring">Удалить из корзины</a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif;?>
                                <tr>
                                    <td>
                                        <div class="foto_ring_order">
                                            <img src="images/small_ring1.png" alt=""/>
                                        </div>
                                    </td>
                                    <td class="characteristic">
                                        <p class="upper">Обручальное кольцо из золота с бриллиантами</p>

                                        <p><strong>вес:</strong> 3,0 г</p>

                                        <p><strong>вставка:</strong> цирконий</p>

                                        <p><strong>вес вставки:</strong> 0,3 г</p>
                                    </td>
                                    <td>K 211 22 11 <br/>K 211 22 11</td>
                                    <td class="checkbox_col">
                                        <div class="check_element">
                                            <select name="sel_type" id="sel_type">
                                                <option value="1">пара</option>
                                                <option value="2">мужское</option>
                                                <option value="3">женское</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="del_link"><a href="#" class="del_ring">Удалить из корзины</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="buttons">
                            <a href="checkout_page.html" class="btn_reg btn_ok float_left">Оформить заказ</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
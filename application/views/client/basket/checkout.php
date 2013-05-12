<script type="text/javascript" xmlns="http://www.w3.org/1999/html" src="/assets/js/jquery.selectBox.js"></script>
<script type="text/javascript" src="/assets/js/custom-form-elements.js"></script>
<script type="text/javascript">
    $(".check_element select, .wrap_sel select, .city_sel select").selectBox();
</script>
<div class="wrapper registration">
    <div class="top_bg_article">
        <div class="btm_bg_article">
            <div class="show_ring static checkout_page">
                <a href="#" class="btn_close" title="Закрыть">Закрыть</a>

                <form action="/basket/buy/" class="form_buy">
                    <fieldset>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Главная</a><span></span></li>
                                <li><a href="/basket/show/">Мне понравилось</a><span></span></li>
                                <li>Оформление заказа</li>
                            </ul>
                        </div>
                        <?php if (!$this->ion_auth->logged_in()): ?>
                        <p><a href="/auth/login/" class="blue_link">
                            Войдите в систему</a> или <a href="/auth/register/" class="blue_link">зарегистрируйтесь</a>,
                            это ускорит оформление заказа.
                        </p>
                        <?php else:?>
                        <?php $profile = $this->ion_auth->profile();?>
                        <?php endif;?>
<!--                        --><?php //var_dump(isset($profile)?$profile:'');?>
                        <p class="head_checkout">Оформление заказа</p>
                        <div class="left_part">
                            <div class="element">
                                <label for="name_recipient">Имя получателя</label>
                                <input type="text" id="name_recipient" name="name_recipient" value="<?php echo isset($profile)?$profile->first_name:''?>"/>
                            </div>
                            <div class="element">
                                <label for="number_phone">Телефон</label>
                                <!--                                <input type="text" id="number_phone" class="small_input" name="number_phone" value=""/>-->
                                <input type="text" id="number_phone" name="number_phone" value="<?php echo isset($profile)?$profile->phone:''?>"/>
                                <em class="example">Например, 098 765 43 21</em>
                            </div>
                            <div class="element big_label">
                                <label for="your_city">Город, в котором Вы<br/>находитесь</label>
                                <input type="text" id="your_city" name="your_city" value="<?php echo isset($profile)?$profile->company:''?>"
                                       title="Город, в котором Вы находитесь"/>
                            </div>
                            <div class="element">
                                <label for="email">Электронная почта:</label>
                                <input type="text" id="email" name="email" value="<?php echo isset($profile)?$profile->email:"Введите Ваш email"?>"
                                       title="Введите Ваш email"/>
                            </div>
                            <div class="check_element deals_check">
                                <input type="checkbox" checked="checked" class="styled" name="deals" id="deals"/>
                                <label for="deals">Хочу узнавать о спецпредложениях</label>
                            </div>
                            <a href="#" class="add_comments" onclick="$(this).after('<textarea name=\'description\' rows=\'5\' cols=\'60\'></textarea>');$(this).remove()">Добавить комментарий к заказу</a>

                            <div class="buttons">
                                <input class="btn_reg btn_ok float_left" type="submit" value="Заказ подтверждаю"/>

                                <p class="license_agreement">Подтверждая заказ, я соглашаюсь<br/>с <a href="/article/polzovatelskoe_soglashenie/" target="_blank">пользовательским
                                    соглашением</a></p>
                            </div>
                        </div>
                        <div class="right_part_order">
                            <p class="head_checkout">Мой заказ</p>

                            <div class="scroll_block">
                                <?php if (!empty($products)): ?>
                                <?php foreach ($products as $product): ?>
                                    <input type="hidden" name="product[]" value="<?php echo $product['id']?>"/>
                                    <div class="block_foto">
                                        <a href="/basket/show/" class="arrow_order"></a>

                                        <div class="foto_ring_order">
                                            <img src="/uploads/products/<?php echo $product['image_small']?>"
                                                 alt=""/>
                                        </div>
                                        <div class="descript_ring">
                                            <strong class="head_articul"><?php echo $product['artikul']?></strong>

                                            <p><strong>вес:</strong> <?php echo $product['m_weight']?> г</p>

                                            <p><strong>вставка:</strong> <?php echo $product['rock']?></p>
<!--                                            <p><strong>вес вставки:</strong> 0,3 г</p>-->
                                            <div class="check_element">
                                                <?php
                                                $male_checkbox='ring_'.$product['id'].'_male';
                                                ?>
                                                <p><input type="checkbox"
                                                    <?php if (isset($$male_checkbox) && !empty($$male_checkbox)): ?>
                                                          checked="checked"
                                                        <?php endif;?>
                                                          name="<?php echo $male_checkbox?>"/>
                                                    <strong>Мужское</strong>
                                                </p>
                                            </div>

                                            <div class="check_element">
                                                <?php
                                                $female_checkbox='ring_'.$product['id'].'_female';
                                                ?>
                                                <p><input type="checkbox"
                                                    <?php if (isset($$female_checkbox) && !empty($$female_checkbox)): ?>
                                                          checked="checked"
                                                        <?php endif;?>
                                                          name="<?php echo $female_checkbox?>"/>
                                                    <strong>Женское</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div><br/>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </div>
<!--                            <div class="promo_kod">-->
<!--                                <a href="#">Добавить промо-код</a>-->
<!--                            </div>-->
                            <div class="edit_order">
                                <a href="/basket/show/">Редактировать</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
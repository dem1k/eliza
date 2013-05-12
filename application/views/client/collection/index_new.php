<style>
    .hidden_field, .metall_hidden, .color_hidden, .rock_hidden, div.popular, div.newest {
        display: none;
    }
</style>
<article class="col2">
    <h3 class="pad_top1">Витрина</h3>

    <div class="wrapper pad_bot3">
    <form method="GET" name="filters" class='form_filters'>
        <?php if (isset($conditions['search']) && $conditions['search']): ?>
        <input type="hidden" class="search" name="search" value="<?php echo $conditions['search'] ?>"/>
        <?php endif;?>

    </form>
    <div class="models">
        <div class="show_ring" style="display: none"></div>
        <ul class="catalog">

            <?php
            foreach ($products as $key => $product):?>
                <li class="cat_product">
                    <div class="popular" type="text"><?=$product->fan?></div>
                    <div class="newest" type="text"><?=$product->new ?></div>
                    <a href="#">
                        <?php
                        if (file_exists('./uploads/products/th/$product->image_small'))
                            $thumb = 'th';
                        else
                            $thumb = '';
                        ?>
                        <img height="188px" src="/uploads/products/<?=$thumb . $product->image_small ?>" alt=""/>
                    </a>

                    <div class="hover_model" key="<?=$product->id ?>">
                        <div class="top_part">
                            <strong><?=$product->artikul ?></strong>
                            <br/>
                            <span>вес <span id="m_weight1"><?=$product->m_weight ?></span> г.</span><br/>
                            <a class="show_more_details" href="/product/<?=$product->id?>"
                               onclick="window.show_more_details(this);return false">Узнать больше</a>
                        </div>

                        <div style="display: none;" id="rock"><?=$product->rock_id ?></div>
                        <div style="display: none;" id="name1"><?=$product->name ?></div>
                    </div>
                </li>
                <?php endforeach;?>


        </ul>
    </div>
</div>
    </div>

</article>
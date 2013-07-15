<article class="col1">
    <div class="pad_bot3">

    </div>
    <div class="box1">

        <div class="pad">
            <strong>Каталог</strong>
            <ul class="pad_bot1 list1">
                <?php if (isset($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <li>
                        <span class="right color1"></span>
                        <a href="<?php echo base_url('category/' . $category['slug'])?>">
                            <?php echo $category['name']?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                <?php endif;?>
            </ul>
        </div>
    </div>
</article>



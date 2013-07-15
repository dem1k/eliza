    <div id="sidebar">

        <div class="sidebox">
            <div class="sidetitle"><span>Категории раздела</span>
            </div>
            <div class="inner">
                <div class="cat-blocks with-clear" style="width:100%!important">
                <div  class="normal">Для мужчин&nbsp;<span class="prodCounter">(1)</span></div>
                <ul>
                    <?php if (isset($categories)): ?>
                    <?php $class_odd='class="odd"';
                    foreach ($categories as $category): ?>
                        <li <?php echo $class_odd;?>>
                            <?php  if($class_odd !='class="odd"'){$class_odd = 'class="odd"'; }else{$class_odd='';}?>

                            <span class="right color1"></span>
                            <a href="<?php echo base_url('category/' . $category['slug'])?>">
                                <?php echo $category['name']?>
                            </a>&nbsp;<span>(3)</span>
                        </li>
                        <?php endforeach; ?>
                    <?php endif;?>
                </ul>
            </div>
            </div>
        <div class="clr"></div>
    </div>


    </div>
</aside>
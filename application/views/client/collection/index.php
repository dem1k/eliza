
<div class="wrapper">

    <div class="filters" >

        <ul class="name_filter">
            <li><a href="#"><strong>металл</strong><span>&nbsp;</span></a>
                <div class="wrap_param">
                    <ul class="parametrs metal_filter">
                        <?php foreach($metals as $metal):?>
                        <li >
                            <a href="#" class="check_box" metal_id="<?= $metal['id']?>"><?= $metal['name']?></a>
                        </li>
                        <?php endforeach?>
                        <li class="show_all" metal_id=" "><a href="" >показать все</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#"><strong>цвет</strong><span>&nbsp;</span></a>
                <div class="wrap_param">
                    <ul class="parametrs color_filter">
                        <?php foreach($colors as $color):?>
                        <li><a href="#" class="check_box"  color_id="<?= $color['id']?>"><?= $color['name']?></a></li>
                        <?php endforeach?>
                        <li class="show_all"><a href="#" >показать все</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#"><strong>камень</strong><span>&nbsp;</span></a>
                <div class="wrap_param">
                    <ul class="parametrs rock_filter">
                        <?php foreach($rocks as $rock):?>
                        <li ><a href="#" class="check_box" rock_id="<?= $rock['id']?>"><?= $rock['name']?></a></li>
                        <?php endforeach?>
                        <li class="show_all"><a href="#" >показать все</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#"><strong>сортировать по</strong><span>&nbsp;</span></a>
                <div class="wrap_param ">
                    <ul class="parametrs ">
                        <li class="sort_btn "><a class="newest" href="#">новинки</a></li>
                        <li class="sort_btn popular"><a class="popular" href="#">популярные</a></li>
                        <!--li class="show_all"><a href="#">показать все</a></li-->
                    </ul>
                </div>
            </li>
            <li><a href="#"><strong>показать на странице</strong><span>&nbsp;</span></a>
                <div class="wrap_param drop-down" id="page-by" >
                    <div class="panel">
                        <ul class="parametrs">
<!--                            <li class="onpage"><a class="pg20 onpage" href="#">20 колец</a></li>-->
<!--                            <li class="onpage"><a class="pg60 onpage" href="#">60 колец</a></li>-->
<!--                            <li class=""><a class="pg100 onpage" href="#">100 колец</a></li>-->
<!--                            <li class="onpage_show_all"><a class="all onpage_show_all" href="#">показать все</a></li>-->
                            <li class="onpage"><a class="pg20" href="#">20 колец</a></li>
                            <li class="onpage"><a class="pg60" href="#">60 колец</a></li>
                            <li class=""><a class="pg100" href="#">100 колец</a></li>
                            <li class="onpage_show_all"><a class="all" href="#">показать все</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="models" >
        <div class="nav_pages">
            <div class="list_pages">
                <ul>
                    <li class="nav_prev"><a href="#">Предыдущая</a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">99</a></li>
                    <li class="nav_next"><a href="#">Следующая</a></li>
                </ul>
            </div>
        </div>
        <ul class="catalog">

            <?php
//            var_dump($products);die();
            foreach($products as $key => $product):?>
            <li class="cat_product">
                <div class="popular" type="text"><?=$product->fan?></div>
                <div class="newest" type="text"><?=$product->new ?></div>
                <!--p class="price"><?=$product->new ?></p-->
                <a href="#">
                    <?php
                    if(file_exists('./uploads/products/th/<?=$product->image_small'))
                        $thumb='th';
                    else
                        $thumb='';
                    ?>
                    <img height="188px"  src="/uploads/products/th/<?=$thumb.$product->image_small ?>" alt="" />
                </a>
                <div class="metall_hidden" type="text"><?=$product->metal_id ?></div>
                <div class="color_hidden" type="text"><?=$product->color1_id ?></div>
                <div class="rock_hidden" type="text"><?=$product->rock_id ?></div>
                <div class="hover_model" key="<?=$product->id ?>">
                    <div class="top_part" >
                        <strong><?=$product->m_art ?></strong>
                        <br/><span>вес <span id="m_weight1"><?=$product->m_weight ?></span> г</span><br/>
                        <a href="#">Узнать больше</a>
                    </div>
                    <div class="btm_part">
                        <strong><?=$product->f_art ?></strong>
                        <br/><span>вес <span id="f_weight1"><?=$product->f_weight ?></span> г</span><br/>
                        <a href="#">Узнать больше</a>
                    </div>
                    <div style="display: none;" id="rock"><?=$product->rock_id ?></div>
                    <div style="display: none;" id="name1"><?=$product->name ?></div>
                </div>
            </li>
            <?php endforeach;?>


        </ul>
        <div class="nav_pages">
            <div class="list_pages bottom_nav">
                <ul>
                    <li class="nav_prev"><a href="#">Предыдущая</a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">99</a></li>
                    <li class="nav_next"><a href="#">Следующая</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel">
        <div id="filter">
            <input class="metall_hidden" type="text"/>
            <input class="color_hidden" type="text"/>
            <input class="rock_hidden" type="text"/>
        </div>
    </div>
</div>



<script>

    function init_pager(){

        var jplist = $(".wrapper").jplist({
            sort: {
                newest: "div.newest",
                popular: "div.popular"
            },
            sort_name: ".newest",
            sort_is_num: true,
            filter: {
                metall_hidden: "div.metall_hidden",
                color_hidden: "div.color_hidden",
                rock_hidden: "div.rock_hidden",
            },
            filter_path: "#filter",
            items_box: ".catalog",
            item_path: ".cat_product",
            pagingbox: ".nav_pages",
            cookies: false,
            items_on_page: 8,
        });
    }


    $(document).ready(function(){



        $('.metal_filter > li.show_all > a').live('click',function(){
            $('.metal_filter > li').removeClass('active');
            $('input.metall_hidden').val('').keyup();
            return false;
        })
        $('.color_filter > li.show_all > a').live('click',function(){
            $('.color_filter > li').removeClass('active');
            $('input.color_hidden').val('').keyup();
            return false;
        })
        $('.rock_filter > li.show_all > a').live('click',function(){
            $('.rock_filter > li').removeClass('active');
            $('input.rock_hidden').val('').keyup();
            return false;
        })
        $('.metal_filter').find('a.check_box').live('click',function(){
            $(this).parent().toggleClass('active');
            var aArr= new Array();
            aArr=$('.metal_filter > li.active > a');
            var search_str='';
            for(i=0;i<aArr.length;i++){
                if (i!=aArr.length-1)
                    search_str+=$(aArr[i]).attr('metal_id')+',';
                else
                    search_str+=$(aArr[i]).attr('metal_id');
            }
            $('input.metall_hidden').val(search_str).keyup();
            //            $('input.metall_hidden').keyup();
            return false;
        })
        $('.color_filter').find('a.check_box').live('click',function(){
            $(this).parent().toggleClass('active');
            var aArr= new Array();
            aArr=$('.color_filter > li.active > a');
            var search_str='';
            for(i=0;i<aArr.length;i++){
                if (i!=aArr.length-1)
                    search_str+=$(aArr[i]).attr('color_id')+',';
                else
                    search_str+=$(aArr[i]).attr('color_id');
            }
            $('input.color_hidden').val(search_str).keyup();
            //            $('input.metall_hidden').keyup();
            return false;
        })
        $('.rock_filter').find('a.check_box').live('click',function(){
            $(this).parent().toggleClass('active');
            var aArr= new Array();
            aArr=$('.rock_filter > li.active > a');
            var search_str='';
            for(i=0;i<aArr.length;i++){
                if (i!=aArr.length-1)
                    search_str+=$(aArr[i]).attr('rock_id')+',';
                else
                    search_str+=$(aArr[i]).attr('rock_id');
            }
            $('input.rock_hidden').val(search_str).keyup();
            return false;
        })

        $('li.sort_btn > a').live('click',function(){
            $(this).parent().parent().children('li').removeClass('active');
            $(this).parent().toggleClass('active');
            return false;
        });
        $('#page-by ul li a.onpage').live('click',function(){
            $(this).parent().parent().children('li').removeClass('active');
            $(this).parent().toggleClass('active');
            return false;
        });
        $('#page-by ul li a.onpage_show_all').live('click',function(){
            $(this).parent().parent().children('li').removeClass('active');
            return false;
        });

        $('.cat_product').live('click',function(){
            id=$(this).children('.hover_model').attr("key")
            $('#m_art').text($(this).find('.top_part').children('strong').text())
            $('#f_art').text($(this).find('.btm_part').children('strong').text())
            $("#m_weight").text($(this).find('#m_weight1').text())
            $("#f_weight").text($(this).find('#f_weight1').text())
            $("#name").text($(this).find('#name1').text())
            $('.names_ring :first-child').text($('#m_art').html());
            $('.names_ring :nth-child(2)').text($('#f_art').html());
            rock_id=$(this).find('#rock').text();

            $.post("/product/getProductData/", { key: "getData",id:id },
            function(data){
//                testImage('/uploads/products/'+data.image_big);
                $('.picture').children('img').attr('src','/uploads/products/'+data.image_big);
                $('.show_ring').show();
                $(".rock").text(data.rock)
            }, "json");
//            $.post("/product/getProductRock/", { key: "rock",id:rock_id },
//            function(data){
//                $(".rock").text(data.name)
//                $('.show_ring').show();
//            }, "json");

        })
        $('.btn_close').click(function(){
            $('.show_ring').hide();
        })

        init_pager();

    })
</script>



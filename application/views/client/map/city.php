
<!--obruchalno.com-->
<script src="http://api-maps.yandex.ru/1.1/index.xml?key=AAPBYFABAAAAxzspRQIAJfEXMtbbIs-dE3j4qqYvBpnCFYsAAAAAAAAAAABiZCTYDl6ILBLmQ2HtGNBuSBOqhg=="
        type="text/javascript"></script>

<!--dem1k-->
<!--<script src="http://api-maps.yandex.ru/1.1/index.xml?key=AOQvYlABAAAAxJSQNQIApUCVVVACjS-ypN3ZjV-W7H_DYWEAAAAAAAAAAAAEL-i8znCkJspSpd97dNCMpG2xTw=="-->
<!--        type="text/javascript"></script>-->
<script type="text/javascript">
    window.onload = function () {
        var map = new YMaps.Map(document.getElementById("YMapsID"));
        var geocoder = new YMaps.Geocoder("<?=$city->city_ru?>, <?=$city->addr2?> <?//=$city->addr?>", { prefLang : "ru"} );
        var zoom = new YMaps.Zoom({});
        YMaps.Events.observe(geocoder, geocoder.Events.Load, function (geocoder) {
            map.addOverlay(geocoder.get(0));
            map.setBounds(geocoder.get(0).getBounds());
            map.setType(YMaps.MapType.HYBRID)
            map.addControl(zoom);
        });
    }



</script>




<div class="wrapper">
    <div class="bg_maps">
        <div class="left_text">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Главная</a><span></span></li>
                    <li><a href="/map/">Магазины</a><span></span></li>
                    <li><?=$city->city_ru?></li>
                </ul>
            </div>
            <div class="text_about">
                <strong><?=$city->city_ru?></strong>
                <p><?=$city->addr?><br/><?=$city->addr2?><br/><?=$city->description?></p>
                <!--p>ТЦ «Пирамида»<br/>ул. Мишуги, 4 (м. Позняки)<br/>Ювелирный супермаркет «Укрзолото»</p-->
            </div>
            <a class="back" href="/map/">Вернуться к списку магазинов</a>
        </div>
        <div class="map_img">
            <div id="YMapsID" style="width:600px;height:400px"></div>
            <!--img src="/assets/images/kiev_map.jpg" alt="" /-->
        </div>
    </div>
</div>
<div>目前位置：首頁 > 分類網誌 > <span class="change1">健康新知</span></div>
<div class="d-f">
    <fieldset class="w-30">
        <legend>分類網誌</legend>
        <p class="po_btn" onclick="get_title(1,'健康新知')">健康新知</p>
        <p class="po_btn" onclick="get_title(2,'菸害防治')">菸害防治</p>
        <p class="po_btn" onclick="get_title(3,'癌症防治')">癌症防治</p>
        <p class="po_btn" onclick="get_title(4,'慢性病防治')">慢性病防治</p>
    </fieldset>

    <fieldset class="w-60">

        <legend class="change2">文章列表</legend>

        <div class="news_div">
            
        </div>

    </fieldset>

</div>

<script>
    get_title(1,'健康新知');
    function get_title(type,text){
        $('.change1').text(text);

        $.get('./api/get_title.php',{type},(res)=>{
            $('.news_div').html(res);
        })
    }

    function get_news(id,e){
        $('.change2').text($(e).text());

        $.get('./api/get_news.php',{id},(res)=>{
            $('.news_div').html(res);
        })
    }
</script>
<div>目前位置：首頁 > 分類網誌 > <span id="nav">健康新知</span></div>
<fieldset style="display:inline-block;vertical-align:top;width:30%">
  <legend>網誌分類</legend>
<div id="tab1" class="show"><a><?=$titletext[1]?></a></div>
<div id="tab2" class="show"><a><?=$titletext[2]?></a></div>
<div id="tab3" class="show"><a><?=$titletext[3]?></a></div>
<div id="tab4" class="show"><a><?=$titletext[4]?></a></div>
</fieldset>
<fieldset style="width:50%;display:inline-block;">
  <legend>文章列表</legend>
  <div id="list"></div>
  <div id="text"></div>
</fieldset>
<script>
let article;
getList(1)
$(".show").on("click",function(){
  let nav=$(this).text()
  $("#nav").text(nav)
  let type=$(this).attr("id").substr(3)
  getList(type)
})
function getList(type){
  $.post("api.php?do=getList",{type},function(x){
    article=JSON.parse(x)
    let list="";
    article.forEach(function(val,idx){
      list=list+`<a href="javascript:showPost(${idx})">${val.title}</a><br>`;
    })
    $("#text").hide()
    $("#list").html(list)
    $("#list").show();
  })
}

function showPost(idx){
  let post="<pre>"+article[idx].text+"</pre>";
  $("#list").hide();
  $("#text").html(post);
  $("#text").show();
}

</script>
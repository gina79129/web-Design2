<style>
.all{
  width:95%;
  margin:auto;
}
.ul{
  list-style-type:none;
  display:flex;
  cursor:pointer;
  margin:-1px 0;
}
.ul li{
  padding:5px;
  background:#ddd;
  border:1px solid #999;
  margin:0 -1px;
  position:relative;
  z-index:9999;
}

.txt{
  border:1px solid #999;
  padding:10px;
  margin:-1px 0;
  display:none;
}
</style>

<div class="all">
  <ul class="ul">
    <li class="show" id="tab1"><?=$titletext[1]?></li>
    <li class="show" id="tab2"><?=$titletext[2]?></li>
    <li class="show" id="tab3"><?=$titletext[3]?></li>
    <li class="show" id="tab4"><?=$titletext[4]?></li>
  </ul>
</div>
<div class="txt" id="p1">
<h2><?=$titletext[1]?></h2>
<pre><?=find('newss',['titletext'=>$titletext[1]])['text']?></pre>
</div>
<div class="txt" id="p2">
<h2><?=$titletext[2]?></h2>
<pre><?=find('newss',['titletext'=>$titletext[2]])['text']?></pre>
</div>
<div class="txt" id="p3">
<h2><?=$titletext[3]?></h2>
<pre><?=find('newss',['titletext'=>$titletext[3]])['text']?></pre>
</div>
<div class="txt" id="p4">
<h2><?=$titletext[4]?></h2>
<pre><?=find('newss',['titletext'=>$titletext[4]])['text']?></pre>
</div>
<script>
$("#tab1").css({"background":"white","border-bottom-color":"white"})
$("#p1").show()
$(".show").on("click",function(){
  let id=$(this).attr("id").substr(3)
  $(".show").css({"background":"#ddd","border-bottom-color":"#999"})
  $(".txt").hide()
  $("#tab"+id).css({"background":"white","border-bottom-color":"white"})
  $("#p"+id).show();
})

</script>
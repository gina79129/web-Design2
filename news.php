<fieldset>
  <legend>目前位置:首頁 > 最新文章區</legend>
  <table width="100%">
    <tr  class="ct">
      <td width="30%">標題</td>
      <td width="50%">內容</td>
      <td></td>
    </tr>
    <?
    $all=nums('newss',['sh'=>'checked']);
    $div=5;
    $page=ceil($all/$div);
    $now=(!empty($_GET['p']))?$_GET['p']:1;
    $start=($now-1)*$div;
    $news=q("select * from newss where sh='checked' limit $start,$div");
    foreach($news as $k=>$n){
    ?>
    <tr>
      <td class="clo ti" id="tab<?=$k?>" style="cursor:pointer;"><?=$n['title']?></td>
      <td>
      <div id="list<?=$k?>"><?=mb_substr($n['text'],0,20,"utf8")?>...</div>
      <div id="text<?=$k?>" style="display:none"><pre><?=$n['text']?></pre></div>
      </td>
      <td>
      <?
        if(!empty($_SESSION['login'])){
          if(nums('log',['news'=>$n['id'],'users'=>$_SESSION['login']])>0){
            ?>
            <a href="#" id="good<?=$n['id']?>" onclick="good('<?=$n['id']?>','2','<?=$_SESSION['login']?>')">收回讚</a>
            <?
          }else{
            ?>
            <a href="#" id="good<?=$n['id']?>" onclick="good('<?=$n['id']?>','1','<?=$_SESSION['login']?>')">讚</a>
            <?
          }
        }


      ?>
      
      </td>
    </tr>
    <?
   
  }
    ?>
    <tr>
      <td colspan="3">
      <?
        if(($now-1)>0){
          echo "<a href='?do=news&p=".($now-1)."'>&lt;</a>";
        }
        for($i=1;$i<=$page;$i++){
          if($now==$i){
            echo "<a href='?do=news&p=$i'><span style='font-size:24px;'>$i</span></a>";
          }else{
            
            echo "<a href='?do=news&p=$i'>$i</a>";
          }
        }
        if(($now+1)<=$page){
          echo "<a href='?do=news&p=".($now+1)."'>&gt;</a>";
        }


    ?>  
      </td>
    </tr>
  </table>
</fieldset>
<script>
$(".ti").on("click",function(){
  let id=$(this).attr("id").substr(3)
  $("#list"+id).toggle();
  $("#text"+id).toggle();
})

</script>
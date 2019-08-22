<fieldset>
  <legend>最新文章管理</legend>
  <form action="api.php?do=editnews" method="post">
  <table width="100%" class="ct">
    <tr>
      <td width="10%">編號</td>
      <td width="50%">標題</td>
      <td width="10%">顯示</td>
      <td width="10%">刪除</td>
    </tr>
    <?
     $all=nums('newss','');
     $div=3;
     $page=ceil($all/$div);
     $now=(!empty($_GET['p']))?$_GET['p']:1;
     $start=($now-1)*$div;
     $news=q("select * from newss  limit $start,$div");
    foreach($news as $k=>$n){
    ?>
    <tr>
      <td class="clo"><?=($k+1)?>.</td>
      <td><?=$n['title']?></td>
      <td><input type="checkbox" name="sh[]" value="<?=$n['id']?>" <?=$n['sh']?>></td>
      <td><input type="checkbox" name="del[]" value="<?=$n['id']?>">
    <input type="hidden" name="id[]" value="<?=$n['id']?>"></td>
    </tr>
    <?
      }
    ?>
        <tr>
      <td colspan="4">
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
    <tr>
      <td colspan="4"><input type="submit" value="確定修改"></td>
    </tr>
  </table>


  </form>
</fieldset>
<?
$q=find('que',$_GET['id']);
$total=$q['count'];
?>
<fieldset>
  <legend>目前位置:首頁 > 問卷調查 > <?=$q['text']?></legend>
<table width="100%">

    <?
  $que=all('que',['parent'=>$_GET['id']]);
  foreach($que as $k=>$q){
    $rate=round($q['count']/$total,2);
    // echo $rate;
    ?>
    <tr>
    <td width="50%"><?=$k+1?>.<?=$q['text']?></td>
    <td width="50%"><div style="width:<?=$rate*100?>%;background:#ddd;height:20px;"></div><?=$q['count']?>票(<?=$rate*100?>%)</td>
  </tr>
  <?
    
    }
  ?>
    
</table>
  <div class="ct"><button onclick="lof('?do=que')">返回</button></div>

</fieldset>
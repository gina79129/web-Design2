<?
$q=find('que',$_GET['id']);
?>
<fieldset>
  <legend>目前位置:首頁 > 問卷調查 > <?=$q['text']?></legend>
  <form action="api.php?do=vote" method="post">
    <?
  $que=all('que',['parent'=>$_GET['id']]);
  foreach($que as $q){
    ?>
    <ul style="list-style-type:none;margin:0;padding:0">
    <li><input type="radio" name="count" value="<?=$q['id']?>"><?=$q['text']?></li>
  </ul>
  <?
    
    }
  ?>
  <div class="ct"><input type="hidden" name="parent" value="<?=$_GET['id']?>"><input type="submit" value="我要投票"></div>
  </form>
</fieldset>
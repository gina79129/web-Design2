<fieldset>
  <legend>目前位置：首頁 > 問卷調查</legend>
  <table width="100%">
    <tr class="ct">
      <td width="5%">編號</td>
      <td width="50%">問卷題目</td>
      <td width="10%">投票總數</td>
      <td width="10%">結果</td>
      <td width="10%">狀態</td>
    </tr>
    <?
    $que=all('que',['parent'=>0]);
    foreach($que as $k=>$q){

    ?>
    <tr>
      <td class="ct"><?=($k+1)?>.</td>
      <td><?=$q['text']?></td>
      <td class="ct"><?=$q['count']?></td>
      <td class="ct"><a href="?do=result&id=<?=$q['id']?>">結果</a></td>
      <td class="ct">
        <?
        if(empty($_SESSION['login'])){
          echo "請先登入";
        }else{
          ?>
            <a href="?do=vote&id=<?=$q['id']?>">參與投票</a>
          <?
        }
        ?>
      </td>
    </tr>
    <?
          
        }
    ?>
  </table>
</fieldset>
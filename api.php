<?
include "base.php";
	$do=(!empty($_GET['do']))?$_GET['do']:"";
  switch($do){
      case "getList":
      $type=$_POST['type'];
      $news=all('newss',['type'=>$type]);
      foreach($news as $n){
        $data[]=[
          'id'=>$n['id'],
          'title'=>$n['title'],
          'text'=>$n['text'],
        ];
      }
      echo json_encode($data);
      break;

      case "login":
      $acc=$_POST['acc'];
      $pw=$_POST['pw'];
      $chkacc=nums('users',['acc'=>$acc]);
      if($chkacc>0){
        $chkpass=nums('users',['acc'=>$acc,'pw'=>$pw]);
        if($chkpass>0){
            $_SESSION['login']=$acc;
            if($acc=='admin'){
              echo 1;
            }else{
              echo 2;
            }
        }else{
          echo 3;
        }
      }else{
        echo 4;
      }
      break;

      case "edituser":
      foreach($_POST['id'] as $k=>$id){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
          del('users',$id);
        }
      }
      break;

      case "reg":
      $acc=$_POST['acc'];
      $pw=$_POST['pw'];
      $email=$_POST['email'];
      $chkacc=nums('users',['acc'=>$acc]);
      if($chkacc>0){
        echo 2;
      }else{
        save('users',$_POST);
        echo 1;
      }
      break;
      
      case "editnews":
      foreach($_POST['id'] as $k=>$id){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
          del('newss',$id);
        }else{
          $news=find('newss',$id);
          $news['sh']=(in_array($id,$_POST['sh']))?"checked":"";
          save('newss',$news);
        }
      }
      to("admin.php?do=news");
      break;

      case "newque":
      $text=$_POST['que'];
      save('que',['text'=>$text]);
      $parent=q("select max(`id`) from que")[0][0];
      foreach($_POST['opt'] as $k=>$o){
        save('que',['text'=>$o,'parent'=>$parent]);
      }
      to("admin.php?do=que");
      break;

      case "vote":
      $count=$_POST['count'];
      $parent=$_POST['parent'];
      q("update que set count=count+1 where id in($count,$parent)");
      to("index.php?do=result&id=$parent");
      break;

      case "good":
      $type=$_POST['type'];
      $id=$_POST['id'];
      $user=$_POST['user'];
      switch($type){
        case "1":
        save('log',['news'=>$id,'users'=>$user]);
        $news=find('newss',$id);
        $news['good']++;
        save('newss',$news);
        break;
        case "2":
        $log=find('log',['news'=>$id,'users'=>$user]);
        del('log',$log['id']);
        $news=find('newss',$id);
        $news['good']--;
        save('newss',$news);
        break;
      }
      break;
    }
?>
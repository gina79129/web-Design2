<?
$pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=web15-2","root","");
session_start();
$titletext=[
  1=>'健康新知',
  2=>'菸害防治',
  3=>'癌症防治',
  4=>'慢性病防治',
];

if(empty($_SESSION['total'])){
  if(nums('totals',['date'=>date("Y-m-d")])>0){
    $total=find('totals',['date'=>date("Y-m-d")]);
    $total['total']=$total['total']+1;
    $_SESSION['total']=$total['total'];
    save('totals',$total);
  }else{
    $total=[
      'date'=>date("Y-m-d"),
      'total'=>1,
    ];
    $_SESSION['total']=1;
    save('totals',$total);
  }
}

function all($table,$data){
  global $pdo;
  if(is_array($data)){
    foreach($data as $k=>$v){
      $str[]=sprintf("%s='%s'",$k,$v);
    }
    $sql="select * from $table where ".implode(" && ",$str)."";
  }else{
    $sql="select * from $table";
  }
  return $pdo->query($sql)->fetchAll();
}

function find($table,$data){
  global $pdo;
  if(is_array($data)){
    foreach($data as $k=>$v){
      $str[]=sprintf("%s='%s'",$k,$v);
    }
    $sql="select * from $table where ".implode(" && ",$str)."";
  }else{
    $sql="select * from $table where id='$data'";
  }
  return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function del($table,$data){
  global $pdo;
  if(is_array($data)){
    foreach($data as $k=>$v){
      $str[]=sprintf("%s='%s'",$k,$v);
    }
    $sql="delete from $table where ".implode(" && ",$str)."";
  }else{
    $sql="delete from $table where id='$data'";
  }
  return $pdo->exec($sql);
}

function save($table,$data){
  global $pdo;
  if(!empty($data['id'])){
    foreach($data as $k=>$v){
      if($k !='id'){
        $str[]=sprintf("%s='%s'",$k,$v);
      }
    }
    $sql="update $table set ".implode(" , ",$str)." where id='".$data['id']."'";
  }else{
    $sql="insert into $table (`".implode("`,`",array_keys($data))."`) values ('".implode("','",$data)."');";
  }
  return $pdo->exec($sql);
}

function nums($table,$data){
  global $pdo;
  if(is_array($data)){
    foreach($data as $k=>$v){
      $str[]=sprintf("%s='%s'",$k,$v);
    }
    $sql="select count(*) from $table where ".implode(" && ",$str)."";
  }else{
    $sql="select count(*) from $table";
  }
  return $pdo->query($sql)->fetchColumn();
}

function q($str){
  global $pdo;
  return $pdo->query($str)->fetchAll();
}

function to($p){
  header("location:$p");
}

?>
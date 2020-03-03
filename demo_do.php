<?php
//接收表单传过来的值
$liuyan=empty($_POST['liuyan'])?"":$_POST['liuyan'];
// var_dump($liuyan);die;
//连接数据库
$con=mysqli_connect('59.110.214.57','root','200529','liuyanban');
// var_dump($con);die;
//添加sql语句
$sql="insert into women (liuyan) values('$liuyan')";
// var_dump($sql);die;
//执行sql语句
$res=mysqli_query($con,$sql);
// var_dump($res);
if($res){

  header("refresh:0,url='demo.php'");
}else{

    header("refresh:0,url='demo.php'");
  }
 ?>
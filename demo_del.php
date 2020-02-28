<?php
header('content-type:text/html;charset=utf-8');
$id=$_GET["id"];
$con=mysqli_connect('127.0.0.1','root','root','liuyanban');
$sql="delete from women where id=$id";
$result=mysqli_query($con,$sql);
if($result){
	echo'删除成功';
	header("refresh:1;url='demo.php'");
}else{
	echo'删除失败';
	header("refresh:1;url='demo.php'");
}
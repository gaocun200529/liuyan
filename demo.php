<?php

session_start();
if(isset($_POST['password']) && $_POST['password'] == 'admin'){
    $_SESSION['ok'] = 1;
    header('location:?');
}
if(!isset($_SESSION['ok'])){
    exit('
<div style="width:100%;text-align:center">
        <form method="post" class="chuang">
        <h1 style="color:red">请您输入密码进入私人领域</h1>
            <p style="color:blue">密码：<input type="password" name="password" />
            <button style="color:blue" type="submit" class="btn btn-success">登陆</button></p>

        </form>
</div>
    ');
}
?>
<html>
<head>
<meta charset="utf-8">
	<title>专属留言板</title>
    	<link rel="icon" sizes="any" mask href="https://qzonestyle.gtimg.cn/qzone/v8/img/Qzone.svg">
    	<link rel="stylesheet" type="text/css" href="css/qqZone.css">
</head>
<!-- <script>alert('欢迎来到专属留言板');</script> -->
<body class="topInfo1">
    <div class="topInfo">

    	<div class="zoneName">
    		<h2>属于我们的留言板</h2>
    		<p>曾经的过往只是经历,单独的空间也这醉人的梦</p>
    	</div>
    	<div class="top_bottom">
    	   <div class="container">
    	   	  <ul class="section">
    			<li>秘密留言板</li>
    		</ul>
    	   </div>
    	</div>
    </div>
    <script type="text/javascript">
    function check_login()
{

 if(document.form1.liuyan.value=="")
 {
 alert("留言必填");
 return false;
 }
}
    </script>
  <form action="demo_do.php" method='post' onsubmit="return check_form()">
    <div class="mainframe">
    	<div class="title">留言板</div>
    	<div class="message">把你想说的留下吧</div>
        <input type="text" name='liuyan' class="content" contenteditable="true" onblur='check_name()'/><span id='msg_name'></span>

        <div >
            <input type="submit" class="subbtn" value="发表">
        </div>






    	<div class="msgFrame">


<?php



 $con=mysqli_connect('127.0.0.1','root','root','liuyanban');
//设置每页参数
$a=empty($_GET['a'])?1:$_GET['a'];
//设置每页条数
$pagesize=40;
//设置开始位置
$start=($a-1)*$pagesize;
//查询并用limit限制
$sql="select * from women order by id desc limit $start,$pagesize";
//echo $sql;exit;
//执行sql语句
$result=mysqli_query($con,$sql);
//var_dump($result);exit;
$date=mysqli_fetch_all($result,1);
//查询数据库中的总条数
$sql_only="select * from women ";
$dat=mysqli_query($con,$sql_only);
$res=mysqli_num_rows($dat);
//echo $res;exit;
//总页数；
$row=ceil($res/$pagesize);
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
    <table border=1 class="gao">
        <?php foreach($date as $k=>$v){?>
        <tr>
            <td class="gao2">第<?php echo $v['id'];?>篇</td>
            <td class="gao3"><?php echo $v['liuyan'];?></td>
            <td>
            <a href='demo_del.php?id=<?php echo $v['id'];?>'>删除</a>
       </td>
        </tr>
        <?php }?>
        <td colspan='2'>
        <a href="demo.php?a=1">首页</a>

        <?php if($a>1){ ?>
        <a href="demo.php?a=<?php echo $a-1;?>">上一页</a>
        <?php }?>

        <?php for($i=1;$i<=$row;$i++){?>
        <a href="demo.php?a=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>

        <?php if($a<$row){ ?>
        <a href="demo.php?a=<?php echo $a+1; ?>">下一页</a>
        <?php }?>

        <a href="demo.php?a=<?php echo $row;?>">尾页</a>
        </td>
    </table>
 </body>
</html>




    	    </div>
         </div>
</form>
</body>
<script type="text/javascript" src="js/jquery.js"></script>

<script >
history.go(10);
//     window.onbeforeunload = function (){
//         if(window.event.clientY>0||window.event.altKey){
//             window.onbeforeunload = null;
//         }else{
//         alert("清除");
//         $.ajax({
//             type:"post";
//             url:"main?action=logout";
//             data:"";
//             success:function (data){

//             }
//         }
//     );
//     }
// }
  </script>
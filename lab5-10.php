<!DOCTYPE html>
<html>
	<head>	
		<meta charset="UTF-8">
		<title>ЛР4 Биненда А.</title> 
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="Osn"> 
		<h4>Биненда А.Д.</h4>
		<h1>лабораторная работа №4</h1>

<?php
$connect = mysqli_connect("localhost", "root", "root", "property" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");
$get_fio = $_GET['fio'];
	$name = substr($_GET['fio'], 0, (strlen($_GET['fio'])-1));
	$num = substr($_GET['fio'], -1, 1);
	$v = "num_res". $num;
	$hid = "" . $_GET[$v];
$str = (int)$hid;
$zapros2="UPDATE debtor SET debt='".$_GET['debt']."', id_man='" .$str ."',  fio_man='" .$name."' where id='".$_GET['id']."'";
mysqli_query($connect, $zapros2);
if (mysqli_affected_rows($connect)>0) {
echo 'Все сохранено. <a href="lr4.php"> <br>Вернуться к списку</a>'; }
else { echo 'Ошибка сохранения. <a href="lr4.php"><br> Вернуться к списку</a> '; }
?> 
		
</div>
	</body>
</html
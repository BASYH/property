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
$get_fio = $_GET['adress'];
	$name = substr($_GET['adress'], 0, (strlen($_GET['adress'])-1));
	$num = substr($_GET['adress'], -1, 1);
	$v = "num_res". $num;
	$hid = "" . $_GET[$v];
$str = (int)$hid;
$zapros1="UPDATE tenants SET fio='".$_GET['fio']."', date_r='".$_GET['date_r']."', id_house='" .$str ."', adress_t='" .$name."' where id='".$_GET['id']."'";
mysqli_query($connect, $zapros1);
if (mysqli_affected_rows($connect)>0) {
echo 'Все сохранено. <a href="lr4.php"> <br>Вернуться к списку</a>'; }
else { echo 'Ошибка сохранения. <a href="lr4.php"><br> Вернуться к списку</a> '; }
?> 
		
</div>
	</body>
</html
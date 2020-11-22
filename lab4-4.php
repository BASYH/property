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
		<H2>Добавление новой недвижимости:</H2>

<?php
$connect = mysqli_connect("localhost", "root", "root", "property" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");
$zapros="UPDATE tproperty SET Address='".$_GET['Address'].
"', house_type='".$_GET['house_type']."', footage='"
.$_GET['footage']."', numb_rooms='".$_GET['numb_rooms']."', cost='".$_GET['cost']."'WHERE id=".$_GET['id'];
mysqli_query($connect, $zapros);
if (mysqli_affected_rows($connect)>0) {
echo 'Все сохранено. <a href="lr4.php"> <br>Вернуться к списку недвижимости</a>'; }
else { echo 'Ошибка сохранения. <a href="lr4.php"><br> Вернуться к списку недвижимости</a> '; }
?> 
		
</div>
	</body>
</html>
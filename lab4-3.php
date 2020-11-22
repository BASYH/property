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
$rows=mysqli_query($connect, "SELECT Address, house_type, footage, numb_rooms, cost  FROM tproperty WHERE id=".$_GET['id']);
while ($st = mysqli_fetch_array($rows)) {
$id=$_GET['id'];
$Address = $st['Address'];
$house_type = $st['house_type'];
$footage = $st['footage'];
$numb_rooms = $st['numb_rooms'];
$cost = $st['cost'];
}
print "<form action='lab4-4.php' metod='get'>";
print "Адрес: <input name='Address' size='20' type='int'value='".$Address."'>";
print "<br>Тип дома: <input name='house_type' size='20' type='varchar'value='".$house_type."'>";
print "<br>Метраж: <input name='footage' size='20' type='varchar'value='".$footage."'>";
print "<br>Кол-во комнат: <input name='numb_rooms' size='10' type='varchar'value='".$numb_rooms."'>";
print "<br>Стоимость: <input name='cost' size='20' type='varchar'value='".$cost."'>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"lr4.php\"> Вернуться к списку недвижимости</a>";
?> 
		
</div>
	</body>
</html>
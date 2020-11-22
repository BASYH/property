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
// Подключение к базе данных:
$connect = mysqli_connect("localhost", "root", "root", "property" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");
// Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO tproperty SET Address='" . $_GET['Address']
."', house_type='".$_GET['house_type']."', footage='"
.$_GET['footage']."', numb_rooms='".$_GET['numb_rooms'].
"', cost='".$_GET['cost']. "'";
mysqli_query($connect, $sql_add); // Выполнение запроса
if (mysqli_affected_rows($connect)>0) // если нет ошибок при выполнении запроса
{ print "<p>Спасибо, вы зарегистрировали недвижимость в базе данных.";
print "<p><a href=\"lr4.php\"> Вернуться к списку недвижимости</a>"; }
else { print "Ошибка сохранения. <a href=\"lr4.php\"> Вернуться к списку недвижимости</a>"; }
?>
		
</div>
	</body>
</html>
﻿<!DOCTYPE html>
<html>
	<head>	
		<meta charset="UTF-8">
		<title>ЛР4-5 Биненда А.</title> 
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="Osn"> 
		<h4>Биненда А.Д.</h4>
		<h1>лабораторная работа №4-5</h1>
		<H2>Добавление нового жильца:</H2>
<?
// Подключение к базе данных:
$connect = mysqli_connect("localhost", "root", "root", "property" ) or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
//Кодировка данных получаемых из базы
mysqli_query($connect, "SET NAMES utf8");

$rows = mysqli_query($connect, "SELECT id, Address FROM tproperty ORDER BY id");
$i=0;
        while ($st = mysqli_fetch_array($rows)) {
            $adress[$i] = $st['Address'];
            $id_zh[$i] = $st['id'];
            $i++;
        }
?>
<form action="lab5-2.php" method="get">
<br>Адрес: 
<select name='adress'>
        <?php
        for($i = 0; $adress[$i] != null; $i++): ?>
            <option value="<?=$adress[$i].$i?>"><?=$adress[$i]?></option>
        <?php endfor;
        for($i = 0; $adress[$i] != null; $i++){
$name = "num_res". $i;
$value = "" . $id_zh[$i];
print "<input type='hidden' name='".$name."' value='".$value."'>";
}
        ?>
        </select><br>
ФИО: <input name="fio" size="20" type="varchar">
<br>Дата рождения: <input name="date_r" type="date" size="20">
</textarea>
<p><input name="add" type="submit" value="Добавить">
</form>
<p>  

<p><a href="lr4.php" class="link">назад</a></p>	
</div>
	</body>
</html>

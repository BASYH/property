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
<h4>Вариант 5</h4>
		<?php 
		$connect = mysqli_connect("localhost", "root", "root", "property")or die("Невозможно подключиться к серверу");
		mysqli_query($connect, "SET NAMES utf8");		
?>
<table border="1"> <tr> 
<th> Адрес </th>   
<th> Тип дома  </th>
<th> Метраж </th> 
  <th> Кол-во комнат </th> 
<th> Стоимость </th> 
<th> </th>
<th> </th>
 </tr>
<?php $result=mysqli_query($connect,"SELECT id, Address, house_type, footage, numb_rooms, cost  FROM tproperty");
while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Address'] . "</td>";
echo "<td>" . $row['house_type'] . "</td>";
echo "<td>" . $row['footage'] . "</td>";
echo "<td>" . $row['numb_rooms'] . "</td>";
echo "<td>" . $row['cost'] . "</td>";
echo "<td><a href='lab4-3.php?id=" .$row['id']."'>Редактировать</a></td>";
//запуск скрипта для редактирования
echo "<td><a href='lab4-5.php?id=" .$row['id']."'>Удалить</a></td>";
//запуск скрипта для удаления записи
echo "</tr>";}print "</table>"; 
$num_rows = mysqli_num_rows($result);
// число записей в таблице БД
print("<P>Количество недвижимостей: $num_rows </p>");
?>		
<p> <a href="lab4-1.php">Добавить недвижимость</a>		 
	<p><a href="index.php" class="link">назад </a></p>	
</div>
	</body>
</html>
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
<h4>Жильцы</h4>		 
<table border="1"> <tr> 
<th> ФИО </th>   
<th> Год рождения  </th>
<th> Адрес </th> 
<th> </th>
<th> </th>
 </tr>
<?php $result=mysqli_query($connect,"SELECT id, fio, date_r, id_house, adress_t  FROM tenants");
while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['fio'] . "</td>";
echo "<td>" . $row['date_r'] . "</td>";
echo "<td>" . $row['adress_t'] . "</td>";
echo "<td><a href='lab5-3.php?id=" .$row['id']."'>Редактировать</a></td>";
//запуск скрипта для редактирования
echo "<td><a href='lab5-5.php?id=" .$row['id']."'>Удалить</a></td>";
//запуск скрипта для удаления записи
echo "</tr>";}print "</table>"; 
$num_rows1 = mysqli_num_rows($result);
// число записей в таблице БД
print("<P>Количество жильцов: $num_rows1 </p>");
?>		
<p> <a href="lab5-1.php">Добавить жильца</a>
<h4>Должники</h4>		 
<table border="1"> <tr> 
<th> ФИО </th>   
<th> Долг  </th>
 </tr>
<?php $result=mysqli_query($connect,"SELECT id, fio_man, debt  FROM debtor");
while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['fio_man'] . "</td>";
echo "<td>" . $row['debt'] . "</td>";
echo "<td><a href='lab5-9.php?id=" .$row['id']."'>Редактировать</a></td>";
//запуск скрипта для редактирования
echo "<td><a href='lab5-6.php?id=" .$row['id']."'>Удалить</a></td>";
//запуск скрипта для удаления записи
echo "</tr>";}print "</table>"; 
$num_rows1 = mysqli_num_rows($result);
// число записей в таблице БД
print("<P>Количество должников: $num_rows1 </p>");
?>		
<p> <a href="lab5-7.php">Добавить должника</a>
<p> <a href="gen_pdf.php">PDF</a>
<p> <a href="gen_xls.php">Excel</a>			 
	<p><a href="index.php" class="link">назад </a></p>	
</div>
	</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Даэстр: персонажи</title>
	<link rel="stylesheet" type="text/css" href="assets/css/common_style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/Elements_style.css">
</head>
<body style="background-image: url(assets/image/background.jpg);">
		<div class="center_container" style="width: 1500px;">
			<div class="metitle">
				Персонажи
			</div>
			<div class="menu">
				<?php

					$NUMBER_OF_CARD = 5;

					#Присоединяюсь к своей БД
					$mysqli = new mysqli("127.0.0.1","root","","daestr");
					 if ($mysqli->connect_errno) {
					 #проверочка на ошибку подключения
					 	echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
					 }

					 #получил все записи из таблицы "персонажи"
					 $data = $mysqli->query("SELECT name, MiniDiscription, ImgName FROM mycharacter");

					 #Посчитал количество записей
					 $count_rows = mysqli_num_rows($data);

					 echo "<div class='menu_stroka'>";
					 for($i = 0; $i < $count_rows; ++$i){
					 	$row = mysqli_fetch_row($data);
					 	if(($i % $NUMBER_OF_CARD) == 0){
					 		echo "</div>
					 		<div class='menu_stroka'>";
					 	}
					 	echo "<a class='menu_middle_element'>
					 	<img src='assets/image/character/$row[2]'>

						<div class='black_fon'></div>

						<div class='element_title'>$row[0]</div>
						<div class='element_center_text'>$row[1]</div>
						</a>";
						if($i == $count_rows-1){
							echo "</div>";
						}
					 }
					 ?>
			</div>
		</div>
</body>
</html>
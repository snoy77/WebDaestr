<!DOCTYPE html>
<html>
<head>
	<title>Даэстр: персонажи</title>
	<link rel="stylesheet" type="text/css" href="assets/css/common_style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/index_style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/Elements_style.css">
</head>
<body style="background-image: url(assets/image/background.jpg);">
	<div class="container" style="max-width: 1500px">
		<div class="center_container">
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
					 $data = $mysqli->query("SELECT*FROM mycharacter");

					 #Посчитал количество записей
					 $count_rows = mysqli_num_rows($data);

					 echo "<div class='menu_stroka' style='width: 1500px'>";
					 for($i = 0; $i < $count_rows; ++$i){
					 	$row = mysqli_fetch_row($data);
					 	if(($i % $NUMBER_OF_CARD) == 0){
					 		echo "</div>
					 		<div class='menu_stroka' style='width: 1500px''>";
					 	}
					 	echo "<a class='menu_element' style='height: 440px; width: 280px;'>
					 	<img src='assets/image/index/Персонажи.jpg'>

						<div class='black_fon'></div>

						<div class='element_title'>$row[1]</div>
						<div class='element_center_text'>$row[3]</div>
						</a>";
						if($i == $count_rows-1){
							echo "</div>";
						}
					 }
					 ?>
			</div>
		</div>
	</div>
</body>
</html>
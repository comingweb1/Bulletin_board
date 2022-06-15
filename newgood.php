<?php 
session_start();
require 'connect.php';

if (!empty($_POST['nameGood']) and !empty($_POST['prize']) && !empty($_FILES['img'])) {
		$nameGood = $_POST['nameGood'];
		$prize = $_POST['prize'];
		$file = $_FILES['img'];
	    $srcFileName = $file['name'];
	    $newFilePath1 = __DIR__ . '/uploads/' . $srcFileName; //для сохранения файла
	    $newFilePath = '/uploads/' . $srcFileName;
	    $userid=$_SESSION['id'];
	    if (!move_uploaded_file($file['tmp_name'], $newFilePath1)) {
        $error = 'Ошибка при загрузке файла';
		    } else {
		        $result = 'http://myproject.loc/uploads/' . $srcFileName;
		    }
		$query = "INSERT INTO good SET name='$nameGood', prize='$prize', filePath='$newFilePath',id_user='$userid'";
		mysqli_query($link, $query) or die(mysqli_error($link));
		header('Location: index.php');
		}
		
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="style.css">
	<title>Доска объявлений</title>
</head>
<body>

	<div class="wrapper"></div>
									<div class="header">
										<img class="logo-img" src="img/logo.jpg">
										<img class="logoMain" src="img/logoMain.png">
										<div class="login">
											<?php  if (!empty($_SESSION['login'])) 
											{
												echo $_SESSION['login'];
												echo "<a href='logout.php'>Выход</a>";	
											} else {
												echo "<a href='login.php'>Вход</a>";
											}

										?></br>
										</div>	
									</div>
	<div class="container row ">

							<div class="content">
								<h1 class="textzag"> Добавление нового товара</h1>
								<div class="newGood">
								<?php if (!empty($_SESSION['login'])) {

								
								echo "<form action='/newgood.php' method='post' enctype='multipart/form-data'>
									<p>Введите название товара</p>
									<input name='nameGood'>
									<p>Введите цену товара</p>
									<input name='prize'>
									<p>Загрузите изображение товара</p>
									 <input type='file' name='img' value='Browse'>
							    <input type='submit' value='Добавить'>
								</form>";
								}
								else {
									echo "Для размещения заявления нужно выполнить <a href='login.php'>Авторизацию</a>";
								}
							   ?>
								</div>
							</div>
							<div class="sidebar">
				                <p>Категории</p>
				                <p><a href="newgood.php">Подать объявление</a></p>
				                <p><a href="profile.php">Мои Объявления</a></p>
				            </div>
				</div>			
	<div class="footer">Developed By Vlad Ryzhov</div>>
	
	</div>


	
</body>
</html>
<?php 
session_start();
require 'connect.php';
	//регистрация  
		if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])) { 
			if($_POST['password'] == $_POST['confirmPassword']){ // Проверка совпадения паролей
				if (strlen($_POST['password']) >= 6){// Проверка длины пароля
					$login = $_POST['login'];
					$password = $_POST['password'];
					$email = $_POST['email'];
					
					$query = "INSERT INTO users SET login='$login', password='$password', email='$email'";	
					mysqli_query($link, $query) or die(mysqli_error($link));
					$_SESSION['auth'] = true;
					$_SESSION['login'] = $login;
					$id = mysqli_insert_id($link);
					$_SESSION['id'] = $id; 	
					header('Location: index.php');
				}else {
					$err = "Длина пароля должна быть больше 6 символов";
				}
				} else {
			$err = "Введенные пароли не совпадают";
			}
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
			<div class="login"><a href="login.php">Вход</a></div>
		</div>
	<div class="container row ">
		<div class="content">
			<div class="regForm">
				<form action="" method="POST">
				<?php 
				if(!empty($err)){
					echo $err;
				}?>
				<h1>Регистрация</h1>
				<p>Введите логин<p>
				<input name='login'>
				<p>Введите ваш e-mail</p>
				<input name='email'>
				<p>Введите ваш пароль</p>
				<input name='password' type='password'>
				<p>Повторите пароль</p>
				<input name="confirmPassword" type='password'></p></br>
				<input type='submit' value="Зарегистрироваться"> 
				</form>			
			</div>
		</div>
	<div class="sidebar">
    	<p>Категории</p>
		<p><a href="newgood.php">Подать объявление</a></p>
		<p><a href="profile.php">Мои Объявления</a></p>
    </div>
	</div>			
	<div class="footer">Developed By Vlad Ryzhov</div>
	</div>
</body>
</html>